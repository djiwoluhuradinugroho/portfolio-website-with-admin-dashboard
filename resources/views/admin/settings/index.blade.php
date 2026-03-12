@extends('admin.layouts.app')

@section('content')

<div class="cms-wrapper">

    {{-- HEADER --}}
    <div class="cms-header">
        <div>
            <p class="cms-eyebrow">CMS · Settings</p>
            <h1 class="cms-title">Image Placements</h1>
            <p class="cms-subtitle">Choose which artwork appears in each website section.</p>
        </div>

        <div class="cms-header__actions">
            <a href="{{ route('admin.settings.create') }}" class="cms-create-btn">
                + Create Placement
            </a>

            <button form="placement-form" type="submit" class="cms-save-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Save Changes
            </button>
        </div>
    </div>

    {{-- FORM --}}
    <form id="placement-form" method="POST" action="{{ route('admin.settings.updateAll') }}">
        @csrf

        <div class="placements-stack">

            @foreach($placements as $placement)
            <section class="placement-card">

                <div class="placement-card__header">
                    <span class="placement-card__index">{{ sprintf('%02d', $loop->iteration) }}</span>
                    <h2 class="placement-card__title">{{ $placement->label }}</h2>

                    <div class="carousel-nav">
                        <button type="button" class="carousel-btn prev-btn" onclick="scrollCarousel(this, -1)">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                        </button>
                        <button type="button" class="carousel-btn next-btn" onclick="scrollCarousel(this, 1)">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="artwork-scroll">
                    @foreach($artworks as $art)
                    <label class="artwork-item">

                        @php
                            $isLogo = $placement->key == 'logo';
                            $isSelected = $placement->artworks->contains($art->id);
                        @endphp

                        <input
                            type="{{ $isLogo ? 'radio' : 'checkbox' }}"
                            name="placements[{{ $placement->id }}][]"
                            value="{{ $art->id }}"
                            class="artwork-item__radio"
                            {{ $isSelected ? 'checked' : '' }}
                        >

                        <div class="artwork-item__card">
                            <div class="artwork-item__img-wrap">
                                <img src="{{ asset('storage/'.$art->image_path) }}" alt="{{ $art->title }}" class="artwork-item__img">
                                <div class="artwork-item__check">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                            </div>
                            <p class="artwork-item__label">{{ $art->title }}</p>
                        </div>

                    </label>
                    @endforeach
                </div>

            </section>
            @endforeach

        </div>
    </form>

</div>


<style>
:root {
    --ink:      #0d0d0d;
    --ink-2:    #555;
    --ink-3:    #aaa;
    --surface:  #ffffff;
    --bg:       #f5f5f5;
    --border:   #e8e8e8;
    --radius:   14px;
    --radius-sm:8px;
}

.cms-wrapper {
    max-width: 1100px;
    margin: 0 auto;
    padding: 40px 32px 80px;
    font-family: 'DM Sans', sans-serif;
}

/* ── Header ── */
.cms-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 40px;
    gap: 16px;
    flex-wrap: wrap;
}

.cms-eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--ink-3);
    margin: 0 0 8px;
}

.cms-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--ink);
    margin: 0 0 4px;
    line-height: 1.1;
}

.cms-subtitle {
    font-size: 14px;
    color: var(--ink-3);
    margin: 0;
}

.cms-header__actions {
    display: flex;
    gap: 12px;
    align-items: center;
}

.cms-create-btn {
    padding: 10px 22px;
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    color: var(--ink);
    white-space: nowrap;
    transition: background 0.15s;
}
.cms-create-btn:hover { background: var(--bg); }

.cms-save-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    background: var(--ink);
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    border: none;
    border-radius: var(--radius-sm);
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.15s, transform 0.1s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.cms-save-btn:hover { background: #222; transform: translateY(-1px); }
.cms-save-btn:active { transform: translateY(0); }

/* ── Stack ── */
.placements-stack {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* ── Card ── */
.placement-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 28px 28px 24px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.04);
}

.placement-card__header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
}

.placement-card__index {
    font-size: 11px;
    font-weight: 700;
    color: var(--ink-2);
    letter-spacing: .06em;
    background: var(--bg);
    padding: 3px 8px;
    border-radius: 6px;
    flex-shrink: 0;
}

.placement-card__title {
    font-size: 16px;
    font-weight: 600;
    color: var(--ink);
    margin: 0;
    flex: 1;
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* ── Nav ── */
.carousel-nav {
    display: flex;
    gap: 6px;
    flex-shrink: 0;
    margin-left: auto;
}

.carousel-btn {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: 1.5px solid var(--border);
    background: var(--surface);
    color: var(--ink-2);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s;
}
.carousel-btn:hover {
    border-color: var(--ink);
    color: var(--ink);
    background: var(--bg);
}
.carousel-btn:active { transform: scale(0.93); }
.carousel-btn:disabled {
    opacity: 0.25;
    cursor: not-allowed;
    border-color: var(--border);
    color: var(--ink-3);
    background: var(--surface);
    transform: none;
}

/* ── Scroll ── */
.artwork-scroll {
    display: flex;
    gap: 12px;
    overflow-x: auto;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}
.artwork-scroll::-webkit-scrollbar { display: none; }

/* ── Item ── */
.artwork-item {
    cursor: pointer;
    display: block;
    flex: 0 0 calc(25% - 9px);
    scroll-snap-align: start;
}
.artwork-item__radio { display: none; }

.artwork-item__card {
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    overflow: hidden;
    transition: border-color 0.15s, box-shadow 0.15s;
    background: var(--bg);
}
.artwork-item:hover .artwork-item__card {
    border-color: #888;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}
.artwork-item__radio:checked + .artwork-item__card {
    border-color: var(--ink);
    box-shadow: 0 0 0 3px rgba(0,0,0,0.08);
}
.artwork-item__radio:checked + .artwork-item__card .artwork-item__check {
    opacity: 1;
    transform: scale(1);
}

.artwork-item__img-wrap {
    position: relative;
    aspect-ratio: 4/3;
    overflow: hidden;
}
.artwork-item__img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.2s;
}
.artwork-item:hover .artwork-item__img { transform: scale(1.03); }

.artwork-item__check {
    position: absolute;
    top: 8px; right: 8px;
    width: 26px; height: 26px;
    border-radius: 50%;
    background: var(--ink);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transform: scale(0.6);
    transition: opacity 0.15s, transform 0.15s;
}

.artwork-item__label {
    padding: 8px 10px;
    font-size: 12px;
    font-weight: 500;
    color: var(--ink-2);
    text-align: center;
    background: var(--surface);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .cms-wrapper { padding: 16px 12px 60px; }
    .cms-header { flex-direction: column; align-items: flex-start; margin-bottom: 20px; gap: 12px; }
    .cms-title { font-size: 20px; }
    .cms-header__actions { width: 100%; display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
    .cms-create-btn, .cms-save-btn { width: 100%; justify-content: center; text-align: center; padding: 10px 12px; font-size: 13px; }
    .placement-card { padding: 14px 12px; }
    .placement-card__title { font-size: 13px; }
    .placement-card__header { margin-bottom: 14px; }
    .artwork-item { flex: 0 0 140px; width: 140px; }
    .artwork-scroll { gap: 8px; }
}
@media (max-width: 480px) {
    .artwork-item { flex: 0 0 120px; width: 120px; }
    .cms-header__actions { grid-template-columns: 1fr; }
}
@media (max-width: 360px) {
    .artwork-item { flex: 0 0 100px; width: 100px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.placement-card').forEach(card => {
        updateButtons(card);
        card.querySelector('.artwork-scroll').addEventListener('scroll', () => updateButtons(card));
    });
});

function scrollCarousel(btn, direction) {
    const card   = btn.closest('.placement-card');
    const scroll = card.querySelector('.artwork-scroll');
    const item   = scroll.querySelector('.artwork-item');
    if (!item) return;
    scroll.scrollBy({ left: direction * (item.offsetWidth + 12) * 4, behavior: 'smooth' });
    setTimeout(() => updateButtons(card), 400);
}

function updateButtons(card) {
    const scroll  = card.querySelector('.artwork-scroll');
    const prevBtn = card.querySelector('.prev-btn');
    const nextBtn = card.querySelector('.next-btn');
    if (!prevBtn || !nextBtn) return;
    prevBtn.disabled = scroll.scrollLeft <= 4;
    nextBtn.disabled = scroll.scrollLeft + scroll.clientWidth >= scroll.scrollWidth - 4;
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

@endsection