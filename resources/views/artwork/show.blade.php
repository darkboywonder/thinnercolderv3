@extends('layouts.app')

@section('action')
    <div><i class="fas fa-tags"></i></div>
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


    <info-drawer class="sm:w-3/4 md:w-1/2">
        <div class="flex h-32 items-center justify-center" style="background-color: {{ $artwork->color }}">
            <h2 class="font-poiret text-white text-5xl text-center">{{ $artwork->name }}</h2>
        </div>

        <pricing v-bind:prices="{{ $pricing }}"></pricing>
    </info-drawer>
@endsection
