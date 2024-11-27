@extends('layout.AdminLayout')
@section('content')

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
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <style>
        .upload-btn {
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 12px;
          background-color: #4CAF50;
          color: white;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          text-align: center;
        }
      
        .upload-btn input[type="file"] {
          display: none;
        }
      
        .upload-btn i {
          margin-right: 8px;
        }
      
        .upload-btn:hover {
          background-color: #45a049;
        }
      
        .image-preview {
          margin-top: 20px;
          padding: 10px;
          border: 2px dashed #aaa;
          border-radius: 8px;
          text-align: center;
          min-height: 50px;
        }
      
        .image-preview img {
          max-width: 100%;
          height: 50px;
        }
      </style>
<form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate method="POST" action="{{ url('/admin/about/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <!-- Product Title -->
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Title</label>
                        <input type="text" class="form-control" id="product-title-input" name="title" placeholder="Enter product title" value="{{ old('title', $about->title) }}" required>
                    </div>

                    <!-- CKEditor Description -->
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{{ old('description', $about->description) }}</textarea>
                    </div>

                    <!-- Image Display Section -->
                    @if($about->image)
                        <div class="mb-3">
                            <label for="current-image">Current Image</label>
                            <div>
                                <img src="{{ asset($about->image) }}" alt="About Image" class="img-fluid" style="max-width: 100%; height: 200px;">
                            </div>
                        </div>
                    @else
                        <p>No image uploaded</p>
                    @endif

                    <!-- Image Upload Section -->
                    <div class="form-group mt-3">
                        <label>Upload New Image</label>
                        <button type="button" class="upload-btn">
                            <i class="fa fa-upload"></i> Upload Image
                            <input type="file" id="product-image" name="image" accept="image/*">
                        </button>
                    </div>

                    <!-- Image Preview Section -->
                    <div class="image-preview" id="image-preview">
                        <p>No image selected</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end mb-3 mt-3">
                        <input type="submit" class="btn btn-primary w-sm" value="Submit">
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<!-- CKEditor Initialization Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });

        const uploadButton = document.querySelector('.upload-btn');
        const imageInput = document.getElementById('product-image');
        const imagePreview = document.getElementById('image-preview');
    
        // Open file input when the button is clicked
        uploadButton.addEventListener('click', function () {
            imageInput.click();
        });
    
        // Show image preview when a file is selected
        imageInput.addEventListener('change', function () {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Product Image" style="max-width: 100%; height: auto;">`;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = "<p>No image selected</p>";
            }
        });
    </script>



 <!-- JAVASCRIPT -->
 <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
 <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
 <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.') }}js"></script>
 <script src="{{ asset('assets/js/plugins.js') }}"></script>

 <!-- ckeditor -->
 <script src="{{asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

 <!-- dropzone js -->
 <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>

 <script src="{{ asset('assets/js/pages/ecommerce-product-create.init.js') }}"></script>


@endsection()
