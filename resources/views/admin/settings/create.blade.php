@extends('admin.layouts.app')

@section('content')

<div class="cms-wrapper">

    {{-- HEADER --}}
    <div class="cms-header">
        <div>
            <p class="cms-eyebrow">CMS · Settings</p>
            <h1 class="cms-title">Create Placement</h1>
            <p class="cms-subtitle">Add a new image placement slot for your website.</p>
        </div>

        <a href="{{ route('admin.settings.index') }}" class="cms-back-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            Back to Placements
        </a>
    </div>

    {{-- FORM CARD --}}
    <div class="form-card">

        <div class="form-card__header">
            <span class="form-card__index">01</span>
            <h2 class="form-card__title">Placement Details</h2>
        </div>

        <form method="POST" action="{{ route('admin.settings.store') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="label">
                    Label
                    <span class="form-hint">Displayed name in the CMS</span>
                </label>
                <input
                    id="label"
                    name="label"
                    type="text"
                    placeholder="e.g. Hero Section"
                    class="form-input"
                    value="{{ old('label') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="key">
                    Key
                    <span class="form-hint">Used in code to reference this slot</span>
                </label>
                <div class="input-wrapper">
                    <span class="input-prefix">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>
                    </span>
                    <input
                        id="key"
                        name="key"
                        type="text"
                        placeholder="e.g. hero_section"
                        class="form-input has-prefix"
                        value="{{ old('key') }}"
                        required
                    >
                </div>
                <p class="form-note">Use lowercase letters and underscores only. Example: <code>about_image</code></p>
            </div>

            <div class="form-footer">
                <a href="{{ route('admin.settings.index') }}" class="cancel-btn">Cancel</a>
                <button type="submit" class="cms-save-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    Create Placement
                </button>
            </div>

        </form>
    </div>

</div>

<style>
/* ── Variables ─────────────────────────────────────── */
:root {
    --ink:       #0a0a0a;
    --ink-2:     #404040;
    --ink-3:     #888888;
    --surface:   #ffffff;
    --bg:        #f5f5f5;
    --border:    #d4d4d4;
    --accent:    #0a0a0a;
    --accent-2:  #404040;
    --radius:    14px;
    --radius-sm: 8px;
}

/* ── Layout ────────────────────────────────────────── */
.cms-wrapper {
    max-width: 640px;
    margin: 0 auto;
    padding: 40px 32px 80px;
    font-family: 'DM Sans', sans-serif;
}

/* ── Header ────────────────────────────────────────── */
.cms-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 32px;
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

.cms-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 18px;
    background: var(--surface);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 13px;
    font-weight: 600;
    color: var(--ink-2);
    text-decoration: none;
    transition: all 0.15s;
    white-space: nowrap;
    flex-shrink: 0;
}

.cms-back-btn:hover {
    border-color: var(--ink);
    color: var(--ink);
    background: var(--bg);
}

/* ── Form Card ─────────────────────────────────────── */
.form-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 32px;
}

.form-card__header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border);
}

.form-card__index {
    font-size: 11px;
    font-weight: 700;
    color: var(--ink-2);
    letter-spacing: .06em;
    background: var(--bg);
    padding: 3px 8px;
    border-radius: 6px;
}

.form-card__title {
    font-size: 16px;
    font-weight: 600;
    color: var(--ink);
    margin: 0;
}

/* ── Form Fields ───────────────────────────────────── */
.form-group {
    margin-bottom: 24px;
}

.form-label {
    display: flex;
    align-items: baseline;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 8px;
    flex-wrap: wrap;
}

.form-hint {
    font-size: 12px;
    font-weight: 400;
    color: var(--ink-3);
}

.form-input {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 14px;
    font-family: 'DM Sans', sans-serif;
    color: var(--ink);
    background: var(--bg);
    outline: none;
    transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
    box-sizing: border-box;
}

.form-input:focus {
    border-color: var(--ink);
    background: var(--surface);
    box-shadow: 0 0 0 3px rgba(10,10,10,.08);
}

.form-input::placeholder { color: var(--ink-3); }

.input-wrapper { position: relative; }

.input-prefix {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--ink-3);
    display: flex;
    align-items: center;
    pointer-events: none;
}

.form-input.has-prefix { padding-left: 38px; }

.form-note {
    margin: 6px 0 0;
    font-size: 12px;
    color: var(--ink-3);
    line-height: 1.5;
}

.form-note code {
    background: var(--bg);
    color: var(--ink-2);
    padding: 1px 5px;
    border-radius: 4px;
    font-size: 11px;
    font-family: monospace;
    border: 1px solid var(--border);
}

/* ── Footer Actions ────────────────────────────────── */
.form-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    padding-top: 24px;
    border-top: 1px solid var(--border);
    margin-top: 8px;
}

.cancel-btn {
    padding: 10px 20px;
    background: transparent;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 14px;
    font-weight: 600;
    color: var(--ink-2);
    text-decoration: none;
    transition: all 0.15s;
}

.cancel-btn:hover {
    border-color: var(--ink);
    color: var(--ink);
}

.cms-save-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    background: var(--ink);
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    border: none;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: background 0.15s, transform 0.1s;
    font-family: 'DM Sans', sans-serif;
}

.cms-save-btn:hover { background: #2a2a2a; transform: translateY(-1px); }
.cms-save-btn:active { transform: translateY(0); }

/* ── Responsive ────────────────────────────────────── */
@media (max-width: 640px) {
    .cms-wrapper {
        padding: 20px 16px 60px;
    }

    .cms-title {
        font-size: 22px;
    }

    .cms-header {
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .cms-back-btn {
        width: 100%;
        justify-content: center;
    }

    .form-card {
        padding: 20px 16px;
    }

    .form-footer {
        flex-direction: column-reverse;
        gap: 8px;
    }

    .cancel-btn,
    .cms-save-btn {
        width: 100%;
        justify-content: center;
        text-align: center;
    }
}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

@endsection