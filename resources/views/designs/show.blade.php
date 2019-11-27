@extends('layouts.app')

@section('action')
    <div><i class="fas fa-tags"></i></div>
@endsection

@section('content')
    <info-action-button color="{{ $design->color }}"></info-action-button>

    <div class="flex flex-col items-center">
        <p class="text-center text-3xl text-black font-poiret mt-8 mb-4">{{ $design->name }}</p>

        <div class="shadow-lg mb-4
            @if ($artwork->template == 'Square')
                w-4/6
            @elseif ($artwork->template == 'Landscape')
                w-10/12
            @else
                w-3/5
            @endif
        ">
            <img class="w-full" src="{{ Storage::url($design->image) }}" alt="{{$design->name}} design" />
        </div>
    </div>
@endsection
