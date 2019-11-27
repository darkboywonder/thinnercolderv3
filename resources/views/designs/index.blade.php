@extends('layouts.app')

@section('action')
    <div><i class="fas fa-shopping-cart text-lg"></i></div>
@endsection

@section('content')
    <div class="flex flex-wrap py-16 px-24">
        @foreach ($designs as $design)
            <div class="w-full md:w-1/2 lg:w-1/3 p-0 md:p-4">
                <a class href="{{ route('designs.show', $design) }}">
                    <img class="w-full shadow-md hover:shadow-xl" src="{{ Storage::url($design->image_thumb) }}" alt="{{ $design->name }} thumbnail image" />

                    <p class="font-poiret text-gray-900 sm:text-base md:text-lg text-2xl text-center my-2">
                        {{ $design->name }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>
@endsection
