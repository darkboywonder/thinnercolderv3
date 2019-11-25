@extends('layouts.app')

@section('action')
    <div><i class="fas fa-tags"></i></div>
@endsection

@section('content')
    <div class="absolute top-0 right-0">
        <span>Info</span>

        <i class="fas fa-tags" style="color: {{ $artwork->color }}"></i>
    </div>

    <div class="flex flex-col items-center">
        <p class="text-center text-3xl text-black font-poiret mt-8 mb-4">{{ $artwork->name }}</p>

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
@endsection
