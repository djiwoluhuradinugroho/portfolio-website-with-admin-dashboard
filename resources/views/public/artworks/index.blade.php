@extends('public.layout')

@section('content')
<h1 class="text-4xl font-bold mb-8">Artworks</h1>

<div class="grid grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($artworks as $art)
        <a href="{{ route('artworks.show', $art->id) }}">
            <img
                src="{{ asset('storage/' . $art->image_path) }}"
                class="rounded-xl hover:scale-105 transition"
            >
            <h3 class="mt-2 font-semibold">{{ $art->title }}</h3>
        </a>
    @endforeach
</div>
@endsection
