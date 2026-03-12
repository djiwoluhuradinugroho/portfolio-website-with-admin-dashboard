@extends('admin.layouts.app')

@section('content')
<div class="px-4 sm:px-6 py-6 space-y-6" style="min-height:100vh;background:#f5f5f5;">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h1 class="text-2xl font-bold tracking-tight" style="color:#0d0d0d;">Commission Price List</h1>
        <a href="{{ route('admin.prices.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 hover:-translate-y-0.5"
           style="background:#0d0d0d;color:#fff;box-shadow:0 4px 12px rgba(0,0,0,0.15);">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Price
        </a>
    </div>

    <!-- Desktop Table -->
    <div class="hidden md:block rounded-2xl overflow-hidden"
         style="background:#fff;border:1px solid #ebebeb;box-shadow:0 2px 16px rgba(0,0,0,0.06);">
        <table class="w-full">
            <thead style="background:#f8f8f8;border-bottom:1px solid #ebebeb;">
                <tr>
                    <th class="p-4 text-left text-xs font-semibold uppercase tracking-wider" style="color:#aaa;">Title</th>
                    <th class="p-4 text-left text-xs font-semibold uppercase tracking-wider" style="color:#aaa;">Price</th>
                    <th class="p-4 text-left text-xs font-semibold uppercase tracking-wider" style="color:#aaa;">Status</th>
                    <th class="p-4 text-right text-xs font-semibold uppercase tracking-wider" style="color:#aaa;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                <tr class="transition-colors duration-150 hover:bg-black/[0.02]" style="border-top:1px solid #f5f5f5;">
                    <td class="p-4 font-semibold text-sm" style="color:#0d0d0d;">{{ $price->title }}</td>
                    <td class="p-4">
                        <div class="flex items-center gap-1 text-sm" style="color:#555;">
                            <svg class="w-4 h-4" style="color:#aaa;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">Rp {{ number_format($price->price_from) }}</span>
                            @if($price->price_to)
                                <span style="color:#ccc;">–</span>
                                <span class="font-medium">{{ number_format($price->price_to) }}</span>
                            @endif
                        </div>
                    </td>
                    <td class="p-4">
                        @if($price->is_active)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold"
                                  style="background:#f0faf4;color:#16a34a;">
                                <span class="w-1.5 h-1.5 rounded-full" style="background:#22c55e;"></span>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold"
                                  style="background:#f5f5f5;color:#888;">
                                <span class="w-1.5 h-1.5 rounded-full" style="background:#ccc;"></span>
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="p-4 text-right space-x-3">
                        <a href="{{ route('admin.prices.edit', $price) }}"
                           class="inline-flex items-center gap-1 text-sm font-semibold transition-opacity hover:opacity-60"
                           style="color:#0d0d0d;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.prices.destroy', $price) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this price?')">
                            @csrf @method('DELETE')
                            <button class="inline-flex items-center gap-1 text-sm font-semibold transition-opacity hover:opacity-70"
                                    style="color:#e74c3c;background:none;border:none;cursor:pointer;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden space-y-4">
        @foreach ($prices as $price)
        <div class="rounded-2xl p-5 space-y-4"
             style="background:#fff;border:1px solid #ebebeb;box-shadow:0 2px 12px rgba(0,0,0,0.05);">

            <!-- Title & Status -->
            <div class="flex items-start justify-between gap-3">
                <h3 class="font-bold text-sm" style="color:#0d0d0d;">{{ $price->title }}</h3>
                @if($price->is_active)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap"
                          style="background:#f0faf4;color:#16a34a;">
                        <span class="w-1.5 h-1.5 rounded-full" style="background:#22c55e;"></span>
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap"
                          style="background:#f5f5f5;color:#888;">
                        <span class="w-1.5 h-1.5 rounded-full" style="background:#ccc;"></span>
                        Inactive
                    </span>
                @endif
            </div>

            <!-- Price -->
            <div class="flex items-center gap-1 text-sm" style="color:#555;">
                <svg class="w-4 h-4" style="color:#aaa;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">Rp {{ number_format($price->price_from) }}</span>
                @if($price->price_to)
                    <span style="color:#ccc;">–</span>
                    <span class="font-medium">{{ number_format($price->price_to) }}</span>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex gap-3 pt-3" style="border-top:1px solid #f0f0f0;">
                <a href="{{ route('admin.prices.edit', $price) }}"
                   class="flex-1 inline-flex items-center justify-center gap-1.5 text-sm font-semibold py-2 rounded-xl transition-all hover:bg-black/5"
                   style="color:#0d0d0d;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('admin.prices.destroy', $price) }}"
                      method="POST"
                      class="flex-1"
                      onsubmit="return confirm('Are you sure you want to delete this price?')">
                    @csrf @method('DELETE')
                    <button class="w-full inline-flex items-center justify-center gap-1.5 text-sm font-semibold py-2 rounded-xl transition-all hover:bg-red-50"
                            style="color:#e74c3c;background:none;border:none;cursor:pointer;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection