@extends('public.layout')

@section('content')
<img
    src="{{ asset('storage/' . $artwork->image_path) }}"
    class="rounded-xl max-w-3xl mx-auto"
>

<h1 class="text-3xl font-bold mt-6">
    {{ $artwork->title }}
</h1>

@if ($artwork->description)
    <p class="mt-4 text-gray-600">
        {{ $artwork->description }}
    </p>
@endif

@if ($artwork->price)
    <p class="mt-6 font-semibold">
        Commission Price: {{ $artwork->price->name }}
    </p>
@endif
@endsection
