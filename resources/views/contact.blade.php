@extends('layouts.app')

@section('action')
    <div><i class="fas fa-shopping-cart text-lg"></i></div>
@endsection

@section('content')
    <div class="flex flex-col items-center">
        <h2 class="font-poiret text-5xl text-center mt-16">Contact Us</h2>
        <div class="w-1/2 mt-8">
            <p class="mb-4">Since it’s conception in 2005 Thinner | Colder Creations has helped professionals throughout the entertainment industry turn their visions into reality. With a commitment to quality and passion for preserving artistic originality, I strive to deliver excellence in all areas of service.</p>

            <p class="mb-4">Whether its a digital design or a painting, the goal is to craft the most fitting work for your needs. While I specialize in visual design, I also offer extended creative services in post production for the entertainment industry. Custom social media designs and layouts are also available. My art work can be enjoyed in your business, home or private collection. Custom prints, sizes, and commissions are also available. All custom work guarantees a consultation to evaluate the space and aesthetics. This will ensure I can customize your art piece in every aspect possible.</p>

            <p class="mb-4">For a full list of services, quotes, or questions please don’t hesitate to reach out. Thank you.</p>

            <p class="mb-4">Chris Marquard<br />Thinner | Colder Creations</p>

            <a href="mailto:thinnercolder@gmail.com" class="py-2 px-4 shadow-md rounded text-lg text black bg-white">
                <i class="fas fa-paper-plane mr-2"></i>
                <span>Contact Us</span>
            </a>
        </div>
    </div>
@endsection
