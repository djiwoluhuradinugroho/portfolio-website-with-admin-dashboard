@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 space-y-6">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.prices.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Add Commission Price</h1>
    </div>

    <form action="{{ route('admin.prices.store') }}" method="POST" class="bg-white/80 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-100 space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
            <input
                type="text"
                name="title"
                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                placeholder="e.g. Bust Shot, Full Body"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Price From</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                <input
                    type="number"
                    name="price_from"
                    class="w-full border-2 border-gray-200 rounded-xl pl-8 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                    placeholder="50"
                    required
                >
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Price To <span class="text-gray-400 text-xs font-normal">(optional)</span></label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-semibold">$</span>
                <input
                    type="number"
                    name="price_to"
                    class="w-full border-2 border-gray-200 rounded-xl pl-8 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                    placeholder="100"
                >
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.prices.index') }}"
               class="px-6 py-3 text-sm font-semibold rounded-xl border-2 border-gray-300 hover:bg-gray-50 transition-all duration-200">
                Cancel
            </a>

            <button
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200"
            >
                Save
            </button>
        </div>
    </form>

</div>
@endsection