@extends('admin.layouts.app')

@section('content')
<div class="p-6 space-y-6">

    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Commission Price List</h1>
        <a href="{{ route('admin.prices.create') }}"
           class="flex items-center gap-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Price
        </a>
    </div>

    <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-purple-50 to-pink-50 text-left">
                <tr>
                    <th class="p-4 text-sm font-bold text-gray-700">Title</th>
                    <th class="p-4 text-sm font-bold text-gray-700">Price</th>
                    <th class="p-4 text-sm font-bold text-gray-700">Status</th>
                    <th class="text-right p-4 text-sm font-bold text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                <tr class="border-t border-gray-100 hover:bg-purple-50/30 transition-colors duration-200">
                    <td class="p-4 font-semibold text-gray-800">{{ $price->title }}</td>
                    <td class="p-4">
                        <div class="flex items-center gap-1 text-gray-700">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">Rp {{ number_format($price->price_from) }}</span>
                            @if($price->price_to)
                                <span class="text-gray-400">-</span>
                                <span class="font-medium">{{ number_format($price->price_to) }}</span>
                            @endif
                        </div>
                    </td>
                    <td class="p-4">
                        @if($price->is_active)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">
                                <span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="text-right p-4 space-x-2">
                        <a href="{{ route('admin.prices.edit', $price) }}"
                           class="inline-flex items-center gap-1 text-purple-600 hover:text-purple-700 font-semibold text-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>

                        <form action="{{ route('admin.prices.destroy', $price) }}"
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this price?')">
                            @csrf @method('DELETE')
                            <button class="inline-flex items-center gap-1 text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
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

</div>
@endsection