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
        <div class="w-4/6 mt-16">
            <img class="shadow-lg"  src="{{ Storage::url($artwork->image) }}" alt="{{$artwork->name}} artwork" />

            <p class="text-center text-3xl text-black font-poiret mt-4">{{ $artwork->name }}</p>
        </div>
    </div>
@endsection
