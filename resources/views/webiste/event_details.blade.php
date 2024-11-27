@extends('layout.Webistelayout')

@section('title', 'Event Detail')

@section('content')
<!-- Header Start -->
<div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Event Details</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Event Details</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

{{-- <!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 mb-5">
    <div id="event-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <!-- Dynamically generate carousel indicators based on events -->
            @foreach ($event->media as $index => $mediaItem)
                <li data-bs-target="#event-carousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            <!-- Dynamically generate carousel items for the event -->
            @foreach ($event->media as $index => $mediaItem)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ $mediaItem->path }}" alt="{{ $event->title }}" style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h1 class="text-white text-uppercase mb-md-3">{{ $event->title }}</h1>
                            <h6 class="display-4 text-white">{{ \Illuminate\Support\Str::words($event->description, 15, '...') }}</h6>
                            <a href="{{ route('event.details', ['id' => $event->id]) }}" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#event-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#event-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End --> --}}

 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <!-- Dynamically generate carousel indicators -->
            @foreach ($event->media as $index => $mediaItem)
            <li data-bs-target="#event-carousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
        </ol>
        <div class="carousel-inner">
            <!-- Dynamically generate carousel items -->
            @foreach ($event->media as $index => $mediaItem)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="min-height: 300px;">
                <img class="position-relative w-100" src="{{ $mediaItem->path }}" alt="{{ $event->title }}" style="height: 700px; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

<!-- Carousel End -->


<!-- Event Description Start -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="display-5 text-uppercase mb-4">{{ $event->title }}</h3>
            <p class="text-muted">{{ $event->description }}</p>
        </div>
    </div>
</div>
<!-- Event Description End -->

@endsection
