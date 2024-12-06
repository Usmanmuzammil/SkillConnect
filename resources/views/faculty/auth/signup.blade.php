<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/forms-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Sep 2022 15:05:44 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Faculty | Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>
<style>
    body{
        /* background: #06BBCC ; */
        background: linear-gradient(#0dcaf0 , #06BBCC)
    }
</style>
<body >

    <!-- Begin page -->
    @if ($message = Session::get('success'))
    <div id="successMessage"
        class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show position-fixed top-0 end-0"
        style="z-index: 9999; margin-top: 25px;" role="alert">
        <i class="ri-check-double-line label-icon"></i><strong>{{ $message }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div id="dangerMessage"
        class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show position-fixed top-0 end-0"
        style="z-index: 9999; margin-top: 25px;" role="alert">
        <i class="ri-error-warning-line label-icon"></i><strong>{{ $message }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="container mt-3 w-100" id="form">
                    <!-- end page title -->

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Faculty Sign Up</h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <form action="{{ route('signup.submit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="text-center pt-3 pb-4 mb-1">
                                        <h5>Signup Your Account</h5>
                                    </div> --}}
                                    
                                    <!-- General Information Section -->
                                    <div class="mb-4">
                                        <h5 class="mb-1">General Information</h5>
                                        <p class="text-muted">Fill all Information as below</p>
                                    </div>
                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-name-input">Name</label>
                                                <input type="text" class="form-control" name="name" id="gen-info-name-input" placeholder="Enter Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-email-input">Email</label>
                                                <input type="email" class="form-control" name="email" id="gen-info-email-input" placeholder="Enter Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-password-input">Password</label>
                                                <input type="password" class="form-control" name="password" id="gen-info-password-input" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-password-input">Year Of Experience</label>
                                                <input type="number" class="form-control" name="year_of_experience" id="gen-info-password-input" placeholder="***" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-password-input">Country</label>
                                                <input type="text" class="form-control" name="country" id="gen-info-password-input" placeholder="Enter your country" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="desgination">Freelancer Category</label>
                                                <select name="category" id="category" class="form-control" required>
                                                    <option value="">Select Your Freelancer Category</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Graphic Designer">Graphic Designer</option>
                                                    <option value="Content Writer">Content Writer</option>
                                                    <option value="SEO Specialist">SEO Specialist</option>
                                                    <option value="Digital Marketer">Digital Marketer</option>
                                                    <option value="Video Editor">Video Editor</option>
                                                    <option value="UI/UX Designer">UI/UX Designer</option>
                                                    <option value="Mobile App Developer">Mobile App Developer</option>
                                                    <option value="Software Developer">Software Developer</option>
                                                    <option value="Virtual Assistant">Virtual Assistant</option>
                                                    <option value="Photographer">Photographer</option>
                                                    <option value="Consultant">Consultant</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-facebook-input">Facebook Profile Link (Optional)</label>
                                                <input type="url" class="form-control" name="facebook_link" id="gen-info-facebook-input" placeholder="https://www.facebook.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-instagram-input">Instagram Profile Link (Optional)</label>
                                                <input type="url" class="form-control" name="twitter_link" id="gen-info-instagram-input" placeholder="https://www.instagram.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gen-info-instagram-input">Youtube Profile Link (Optional)</label>
                                                <input type="url" class="form-control" name="youtube_link" id="gen-info-instagram-input" placeholder="https://www.youtube.com">
                                            </div>
                                        </div>
                                    </div>
                    
                                    <!-- Profile Image and Description Section -->
                                    <div class="text-center mt-4">
                                        {{-- <div class="profile-user position-relative d-inline-block mx-auto mb-2">
                                            <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" class="rounded-circle avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input" name="upload_image" type="file" class="profile-img-file-input" accept="image/png, image/jpeg">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-14">Add Image</h5> --}}
                                        {{-- <input type="file" name="upload_image" class="form-control" id=""> --}}
                                            <div class="profile-user position-relative d-inline-block mx-auto mb-2">
                                                <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" class="rounded-circle avatar-lg img-thumbnail user-profile-image" alt="user-profile-image" name="image">
                                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input" accept="*" name="image">
                                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                        <span class="avatar-title rounded-circle bg-light text-body">
                                                            <i class="ri-camera-fill"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <h5 class="fs-14">Add Image</h5>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="gen-info-description-input">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter your brief Description" id="gen-info-description-input" rows="2" required></textarea>
                                    </div>
                    
                                    <!-- Submit Button -->
                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <h5 class="">Already have an Account? <a href="/faculty/login">Login</a></h5>
                                            <input type="submit"   class="btn btn-success btn-label right ms-auto" value=" Submit">
                                    </div>
                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                    
                        <!-- end col -->

          
                        <!-- end col -->
                    </div><!-- end row -->

                    

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->





    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>

    <!-- form wizard init -->
    <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/forms-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Sep 2022 15:05:44 GMT -->
</html>