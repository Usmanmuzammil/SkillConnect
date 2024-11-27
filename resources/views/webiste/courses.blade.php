@extends('layout.Webistelayout')
@section('title','Courses')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Courses</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Courses</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Category Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
                <h1>Explore Top Subjects</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-1.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Web Design</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-2.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Development</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-3.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Game Design</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-5.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Apps Design</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-5.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Marketing</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-6.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Research</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-6.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">Content Writing</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('webisteassets/img/cat-8.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">SEO</h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Category Start -->


   <!-- Courses Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Popular Courses</h5>
            <h1>Download Now To Learn</h1>
        </div>
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="rounded overflow-hidden mb-2">
                    <img class="img-fluid" src="{{ $course->pdf_image }}" alt="" style="height: 330px;width:100%">
                    <div class="bg-secondary p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>{{$course->download_count}} Students</small>
                            <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>{{ $course->created_at->format('F j, Y') }}</small>
                        </div>
                        <h5 class="h5">{{$course->course_title}}</h5>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                 <!-- Button to download PDF -->
                    <a href="{{ $course->pdf_path }}" class="btn btn-primary py-md-2 px-md-4" download="{{ $course->course_title }}.pdf">
                        Download Now
                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          
    
        </div>
    </div>
</div>
<!-- Courses End -->
@endsection
