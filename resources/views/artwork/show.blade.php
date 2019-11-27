@extends('layouts.app')

@section('action')
    <mobile-info-action-button></mobile-info-action-button>
@endsection

@section('content')
    <info-action-button color="{{ $artwork->color }}"></info-action-button>

    <div class="flex flex-col items-center">
        <p class="text-center text-4xl text-black font-poiret mt-8 mb-4">{{ $artwork->name }}</p>

        <div class="shadow-lg mb-4
            @if ($artwork->template == 'Square')
                w-4/6
            @elseif ($artwork->template == 'Landscape')
                w-10/12
            @else
                w-3/5
            @endif
        ">
            <img class="w-full" src="{{ Storage::url($artwork->image) }}" alt="{{$artwork->name}} artwork" />
        </div>
    </div>

    <info-drawer class="w-5/6 md:w-1/2">
        <div class="flex h-24 md:h-32 items-center justify-center" style="background-color: {{ $artwork->color }}">
            <h2 class=" font-poiret text-white text-3xl md:text-5xl text-center">{{ $artwork->name }}</h2>
        </div>

        <div class="flex flex-col justify-center">
            <h4 class="my-2 font-poiret text-2xl text-center text-slate">Original Spec's</h4>

            <section class="flex justify-center">
                <ul class="border-r border-slate font-sans text-slate pr-4">
                    <li class="text-right mb-1">Creation Method</li>
                    <li class="text-right mb-1">Dimensions</li>
                    <li class="text-right mb-1">Canvas Thickness</li>
                    <li class="text-right mb-1">year</li>
                    <li class="text-right mb-1">Number of Pieces</li>
                    <li class="text-right mb-1">Location</li>
                </ul>

                <ul class="text-slate font-sans text-slate pl-4">
                    <li class="mb-1">{{ $artwork->method }}</li>
                    <li class="mb-1">{{ $artwork->dimensions }}</li>
                    <li class="mb-1">{{ $artwork->thickness }}</li>
                    <li class="mb-1">{{ $artwork->year }}</li>
                    <li class="mb-1">{{ $artwork->canvas_number }}</li>
                    <li class="mb-1">{{ $artwork->location }}</li>
                </ul>
            </section>

            <p class="font-open-sans font-weight-light italic text-sm text-gray-700 text-center mt-1 mb-2">Spec's are different for prints</p>
        </div>

        <pricing color="{{ $artwork->color }}" is_sellable="{{ $artwork->is_sellable }}" :prices="{{ $pricing }}"></pricing>
    </info-drawer>
@endsection
