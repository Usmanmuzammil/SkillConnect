@extends('layout.Webistelayout')
@section('title','Home')
@section('content')
<style>
    /* Center the pagination buttons nicely */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        background-color: #f8f9fa;
        border-color: #ddd;
        padding: 8px 15px;
        font-size: 16px;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    /* Active page button */
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    /* Disable state for previous and next buttons */
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #ddd;
    }

    /* Custom icon styles for previous and next buttons */
    .pagination .page-item .page-link i {
        font-size: 18px;
    }

    /* Add a little space around the pagination container */
    .d-flex.justify-content-center.mt-4 {
        margin-top: 20px;
    }
</style>

 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <!-- Dynamically generate carousel indicators -->
            @foreach ($banner as $index => $bannerItem)
                <li data-target="#header-carousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <!-- Dynamically generate carousel items -->
            @foreach ($banner as $index => $bannerItem)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ $bannerItem->image }}" style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h1 class="text-primary text-uppercase mb-md-3">{{ $bannerItem->tagline }}</h1>
                            <h5 class="display-4 text-white ">{{ $bannerItem->description }}</h5>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Carousel End -->


<!-- About Start -->
<div class="container-fluid py-5" style="margin-top: -100px;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ $about->image }}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="text-left mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">{{$about->title}}</h5>
                    {{-- <h1>{{$about->title}}</h1> --}}
                </div>
                <p>{!! $about->description !!}</p>
                {{-- <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- About End -->


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
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-4.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Apps Design</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-6.jpg') }}" alt="">
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
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-7.jpg') }}" alt="">
                    <a class="cat-overlay text-white text-decoration-none" href="">
                        <h4 class="text-white font-weight-medium">Content Writing</h4>
                        <span>100 Courses</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="cat-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/cat-7.jpg') }}" alt="">
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

<!-- Interesting Site Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Dedication</h5>
            <h1>See our dedicated video</h1>
        </div>
        <div class="row ">
            <div class="col-lg-6">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fgovt.degree%2Fvideos%2F1066971594861231%2F&show_text=false&width=476&t=0" width="530" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fgovt.degree%2Fvideos%2F1267225804420818%2F&show_text=false&width=476&t=0" width="476" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                </div>
            </div>
            {{-- <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Blog End -->

    <!-- Courses Start -->
    <div class="container-fluid py-5" style="margin-top: -40px;">
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
                   
                                     <a href="{{ asset( $course->pdf_file) }}" class="btn btn-primary py-md-2 px-md-4" download="{{ $course->course_title }}.pdf">
                                        Download PDF
                                    </a>
                                    
                                     

                         <!-- Static Review Stars Section -->
                    <div class="mt-2" style="font-size: 10px;">
                        <div class="star-rating">
                            <!-- Static 5-Star Rating (All filled stars) -->
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i> 
                            <!-- Optional: Add rating text -->
                            <span class="ml-2">5 / 5</span>
                        </div>
                    </div>
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



<!-- Registration Start -->
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Success Path</h5>
                    <h1 class="text-white">Your Pathway to a Successful Future – Connect with Us!</h1>
                </div>
                
                <p class="text-white">
                    At   <?php
                    $setting = App\Models\Setting::where('key', 'name')->get()->first();
                    if ($setting) {
                        echo $setting->value;
                    } else {
                        echo 'Brand name not found';
                    }
                    ?>, we believe your journey is just as important as your destination. Whether you're seeking guidance, exploring opportunities, or looking for the right resources, we're here to help. By connecting with us, you’re stepping onto a path where every challenge is an opportunity, and every success is celebrated. Your future starts here—let us guide you every step of the way!
                </p>
                
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Expert guidance from faculty and mentors</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Opportunities to grow inside and outside the classroom</li>
                    <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>A vibrant community that supports your success</li>
                </ul>
                
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-light text-center p-4">
                        <h1 class="m-0">Connect Now!</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-primary p-5">
                        <form action="{{url('/user/store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control border-0 p-4" placeholder="Your name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control border-0 p-4" placeholder="Your email" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control border-0 p-4" placeholder="Phone Number" required="required" />
                            </div>
                            <div class="form-group ">
                                <label for="consent">I agree to the terms and conditions and consent to the processing of my data.</label>
                                <input type="checkbox" name="term_condition" value="200" id="consent" name="consent" required>
                            </div>
                           
                            <div>
                                {{-- <button class="btn btn-dark btn-block border-0 py-3" type="submit">Connected</button> --}}
                                <input type="submit" value="Connected" class="btn btn-dark btn-block border-0 py-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration End -->


<!-- College Director Start -->
<!-- About End -->


<!-- teacher Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <!-- Main Heading -->
            <h1 class="font-weight-bold text-primary mb-4">Meet Our Best & Experienced Teachers</h1>
            <p class="lead text-muted">Our team of expert educators is dedicated to your success. Discover the mentors who will guide you every step of the way!</p>
        </div>
        <div class="row">
            @foreach ($teachers as $teacherItem)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{ $teacherItem->image }}" alt="{{ $teacherItem->name }}" style="width: 300px; height: 250px;">
                        {{-- <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->twitter_link}}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->facebook_link}}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{$teacherItem->youtube_link}}" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div> --}}
                    </div>
                    <div class="bg-secondary p-4">
                        <p class="m-0">{{ $teacherItem->desgination }}</p>
                        <h5>{{ $teacherItem->name }}</h5>
                        <a href="/admin/teacher/details/{{$teacherItem->id}}">See Details</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <!-- Custom Styled Pagination with Bootstrap 4 -->
            {!! $teachers->links('pagination::bootstrap-4') !!}
        </div>
        
    </div>
</div>
<!-- teacher Start -->

<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Blog</h5>
            <h1>Latest From Our Blog</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('upload_image/WhatsApp Image 2024-11-13 at 11.16.28 AM.jpeg') }}" alt="">
                    <a  href="">
                        {{-- <h5 class="text-white mb-3"></h5> --}}
                        <a class="blog-overlay text-decoration-none text-white" target="_blank" href="https://drive.google.com/file/d/1_GdwAINT6IRZ74i8tRxj1o16BY0_T1q0/view?usp=drivesdk">Introduction of Computer Science Department Topic</a>
                        <p class="text-primary m-0">Sep 10, 2024</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('upload_image/WhatsApp Image 2024-11-13 at 11.22.53 AM.jpeg') }}" alt="">
                    <a  href="">
                        {{-- <h5 class="text-white mb-3"></h5> --}}
                        <a class="blog-overlay text-decoration-none text-white" target="_blank" href="https://drive.google.com/file/d/1_GdwAINT6IRZ74i8tRxj1o16BY0_T1q0/view?usp=drivesdk">Introduction of Abacus Topic</a>
                        <p class="text-primary m-0">Oct 17, 2024</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('upload_image/WhatsApp Image 2024-11-13 at 11.24.47 AM.jpeg') }}" alt="">
                    <a  href="">
                        {{-- <h5 class="text-white mb-3"></h5> --}}
                        <a class="blog-overlay text-decoration-none text-white" target="_blank" href="https://drive.google.com/file/d/1_GdwAINT6IRZ74i8tRxj1o16BY0_T1q0/view?usp=drivesdk">Introduction of Artifical Intelligence Topic</a>
                        <p class="text-primary m-0">Oct 17, 2024</p>
                    </a>
                </div>
            </div>
            {{-- <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                    <img class="img-fluid" src="{{ asset('webisteassets/img/blog-3.jpg') }}" alt="">
                    <a class="blog-overlay text-decoration-none" href="">
                        <h5 class="text-white mb-3">Lorem elitr magna stet eirmod labore amet labore clita at ut clita</h5>
                        <p class="text-primary m-0">Jan 01, 2050</p>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
