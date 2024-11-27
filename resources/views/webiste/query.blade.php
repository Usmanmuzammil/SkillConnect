@extends('layout.Webistelayout')
@section('title','Home')
@section('content')



    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Query</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Query</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Query Start -->
    <div class="container-fluid py-5">2
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Query!</h5>
                <h1>Any Query</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="Query-form bg-secondary rounded p-5">
                        <div id="success"></div>
                        <form action="{{url('/query/store')}}" id="QueryForm" method="POST">
                            @csrf
                            <div class="control-group">
                                <input type="text" name="name" class="form-control border-0 p-4" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control border-0 p-4" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                {{-- <input type="number" name="phone" class="form-control border-0 p-4" id="subject" placeholder="Number" required="required" data-validation-required-message="Please enter a phone number" /> --}}
                                {{-- <p class="help-block text-danger"></p> --}}
                            </div>
                            <div class="form-group ">
                                <label for="consent">I agree to the terms and conditions and consent to the processing of my data.</label>
                                <input type="checkbox" name="term_condition" value="200" id="consent" name="consent" required>
                            </div>
                            <div class="text-center">
                                {{-- <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Send Message</button> --}}
                                <input type="submit" value="Connect Us!" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Query End -->



@endsection