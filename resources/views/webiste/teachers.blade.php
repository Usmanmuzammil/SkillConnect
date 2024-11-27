@extends('layout.Webistelayout')
@section('title','Home')
@section('content')

  <!-- Header Start -->
  <div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Faculty</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Faculty</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h1 class="font-weight-bold text-primary mb-4">Meet Our Best & Experienced Teachers</h1>
            <p class="lead text-muted">Our team of expert educators is dedicated to your success. Discover the mentors who will guide you every step of the way!</p>
        </div>
        <div class="row">
            @foreach ($teachers as $teacherItem)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{ $teacherItem->image }}" alt="{{ $teacherItem->name }}" style="width: 300px; height: 250px;">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->twitter_link}}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->facebook_link}}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->youtube_link}}" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>{{ $teacherItem->name }}</h5>
                        <p class="m-0">{{ $teacherItem->desgination }}</p>
                        <a href="/admin/teacher/details/{{$teacherItem->id}}">See Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
<!-- Team End -->

@endsection
