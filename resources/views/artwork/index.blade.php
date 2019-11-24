@extends('layouts.app')

@section('action')
    <div><i class="fas fa-shopping-cart text-lg"></i></div>
@endsection

@section('content')
    <div class="flex flex-wrap py-16 px-24">
        @foreach ($artwork as $art)
            <div class="w-full md:w-1/2 lg:w-1/3 p-0 md:p-4">
                <a class href="{{ route('artwork.show', $art) }}">
                    <img class="w-full shadow-md hover:shadow-xl" src="{{ Storage::url($art->image_thumb) }}" alt="{{ $art->name }} thumbnail image" />

                    <p class="font-poiret text-gray-900 sm:text-base md:text-lg text-2xl text-center my-2">
                        {{ $art->name }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
