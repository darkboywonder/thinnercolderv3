@extends('layouts.app')

@section('action')
    <mobile-info-action-button></mobile-info-action-button>
@endsection

@section('content')
    <info-action-button color="{{ $design->color }}"></info-action-button>

    <div class="flex flex-col items-center">
        <p class="text-center text-3xl text-black font-poiret mt-8 mb-4">{{ $design->name }}</p>

        <div class="shadow-lg mb-4
            @if ($design->template == 'Square')
                w-4/6
            @elseif ($design->template == 'Landscape')
                w-10/12
            @else
                w-3/5
            @endif
        ">
            <img class="w-full" src="{{ Storage::url($design->image) }}" alt="{{$design->name}} design" />
        </div>
    </div>

    <info-drawer class="w-5/6 md:w-1/2">
        <div class="flex h-24 md:h-32 items-center justify-center" style="background-color: {{ $design->color }}">
            <h2 class=" font-poiret text-white text-3xl md:text-5xl text-center">{{ $design->name }}</h2>
        </div>

        <div class="flex flex-col items-center">
            <h4 class="my-2 font-poiret text-2xl text-center text-slate">Client</h4>

            <p class="text-slate text-center mb-16">{{ $design->client }}</p>

            <h4 class="my-2 font-poiret text-2xl text-center text-slate">Design Category</h4>

            <p class="text-slate text-center mb-16">{{ $design->category }}</p>

            <h4 class="my-2 font-poiret text-2xl text-center text-slate">Type of Industry</h4>

            <p class="text-slate text-center mb-16">{{ $design->type }}</p>

        </div>
    </info-drawer>
@endsection
