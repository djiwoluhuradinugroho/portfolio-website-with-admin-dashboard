@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 sm:px-6 py-6 space-y-6" style="min-height:100vh;">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.prices.index') }}"
           class="p-2 rounded-lg transition-colors hover:bg-black/5"
           style="color:#555;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold tracking-tight" style="color:#0d0d0d;">Add Commission Price</h1>
    </div>

    <form action="{{ route('admin.prices.store') }}"
          method="POST"
          class="p-6 sm:p-8 rounded-2xl space-y-6"
          style="background:#fff;border:1px solid #ebebeb;box-shadow:0 2px 16px rgba(0,0,0,0.06);">

        @csrf

        {{-- TITLE --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Title</label>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition-all duration-200"
                style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                onfocus="this.style.borderColor='#0d0d0d'"
                onblur="this.style.borderColor='#e2e2e2'"
                placeholder="e.g. Bust Shot, Full Body"
                required
            >
        </div>

        {{-- PRICE FROM --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Price From</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold" style="color:#aaa;">Rp</span>
                <input
                    type="number"
                    name="price_from"
                    value="{{ old('price_from') }}"
                    class="w-full rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none transition-all duration-200"
                    style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                    onfocus="this.style.borderColor='#0d0d0d'"
                    onblur="this.style.borderColor='#e2e2e2'"
                    placeholder="50000"
                    required
                >
            </div>
        </div>

        {{-- PRICE TO --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">
                Price To
                <span class="text-xs font-normal" style="color:#bbb;">(optional)</span>
            </label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold" style="color:#aaa;">Rp</span>
                <input
                    type="number"
                    name="price_to"
                    value="{{ old('price_to') }}"
                    class="w-full rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none transition-all duration-200"
                    style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                    onfocus="this.style.borderColor='#0d0d0d'"
                    onblur="this.style.borderColor='#e2e2e2'"
                    placeholder="100000"
                >
            </div>
        </div>

        {{-- ACTIVE --}}
        <div class="flex items-center gap-3 p-4 rounded-xl" style="background:#f8f8f8;border:1px solid #ebebeb;">
            <input
                type="checkbox"
                name="is_active"
                id="is_active"
                value="1"
                {{ old('is_active') ? 'checked' : '' }}
                class="w-4 h-4 cursor-pointer rounded"
                style="accent-color:#0d0d0d;"
            >
            <label for="is_active" class="text-sm font-semibold cursor-pointer" style="color:#333;">Active</label>
            <span class="text-xs" style="color:#aaa;">Harga ini akan tampil di website</span>
        </div>

        {{-- ACTIONS --}}
        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4" style="border-top:1px solid #f0f0f0;">
            <a href="{{ route('admin.prices.index') }}"
               class="w-full sm:w-auto text-center px-6 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 hover:bg-black/5"
               style="border:1.5px solid #e2e2e2;color:#555;">
                Cancel
            </a>
            <button
                type="submit"
                class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 hover:-translate-y-0.5"
                style="background:#0d0d0d;color:#fff;box-shadow:0 4px 12px rgba(0,0,0,0.15);">
                Save Price
            </button>
        </div>

    </form>
</div>
@endsection