@extends('layout.Webistelayout')
@section('title','Home')
@section('content')

  <!-- Header Start -->
  <div class="container-fluid page-header" >
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">attendence sheet</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">attendence sheet</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h1 class="font-weight-bold text-primary mb-4">Student Attendance Management System</h1>
            <p class="lead text-muted">Attendance tracking is an essential part of maintaining academic discipline and assessing student participation. Our system helps you monitor student attendance efficiently, ensuring accountability and improving overall academic performance.</p>
        </div>
        <div class="row">
            @foreach ($attendences as $attendence)
            <div class="col-md-6 col-lg-4 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <!-- Add a link to trigger modal, pass image src to the modal -->
                        <a href="{{ $attendence->image }}" target="_blank">
                            <img class="img-fluid" src="{{ $attendence->image }}" alt="{{ $attendence->name }}" style="height: 300px; width: 350px;">
                        </a>
                    </div>
                    <div class="bg-secondary p-2">
                        <h5>{{ $attendence->title }}</h5>
                        <p class="m-0">{{ $attendence->department }}</p>
                        <p class="m-0">{{ $attendence->created_at }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        
      
    </div>
</div>
<!-- Team End -->



@endsection
