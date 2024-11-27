@extends('layout.AdminLayout')

@section('content')

    @if ($message = Session::get('success'))
        <div id="successMessage" class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show position-fixed top-0 end-0" style="z-index: 9999; margin-top: 25px;" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>{{ $message }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div id="dangerMessage" class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show position-fixed top-0 end-0" style="z-index: 9999; margin-top: 25px;" role="alert">
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
                        <li class="breadcrumb-item active">Event</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <form method="POST" action="{{ url('/admin/event/store') }}" enctype="multipart/form-data" id="event-form">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Event Title -->
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Title</label>
                            <input type="text" class="form-control" id="product-title-input" name="title" placeholder="Enter event title" required>
                        </div>

                        <!-- CKEditor for Description -->
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Set the description" cols="30" rows="10" required></textarea>
                        </div>

                         <!-- Dropzone for Images -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Upload Images</h4>
                                    </div>
                                    <center>

                                    <div class="card-body">
                                        <div class="dropzone" id="myDropzone">
                                            <div class="fallback">
                                                <input name="images[]" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                </div>
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </div>

                                        <!-- Preview of files -->
                                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                                            <li class="mt-2" id="dropzone-preview-list">
                                                <!-- File preview will be inserted here -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </center>

                        <!-- Submit Button -->
                        <div class="text-end mb-3 mt-3">
                            <input type="submit" class="btn btn-primary w-sm" value="Submit">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
<!-- CKEditor Initialization Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    // Initialize CKEditor for Description field
    ClassicEditor.create(document.querySelector('#description')).catch(error => {
        console.error(error);
    });

    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{ url('/admin/event/store') }}", // URL for the form submission
        method: "POST",
        paramName: "images[]", // Ensure this matches the input name
        maxFilesize: 5, // Max file size in MB
        maxFiles: 5, // Max number of files
        acceptedFiles: "image/*,application/pdf", // Accept images and PDFs
        addRemoveLinks: true,
        init: function () {
            this.on("sending", function (file, xhr, formData) {
                // Add CSRF token to the Dropzone request dynamically
                formData.append("_token", "{{ csrf_token() }}");
            });

            this.on("success", function (file, response) {
                console.log("File uploaded successfully: ", response);
            });

            this.on("error", function (file, errorMessage) {
                console.log("Error uploading file: ", errorMessage);
            });
        }
    });

    // Handle form submission and trigger Dropzone's file processing
    document.querySelector('form').onsubmit = function (e) {
        e.preventDefault(); // Prevent the default form submission
        if (myDropzone.getQueuedFiles().length > 0) {
            myDropzone.processQueue(); // Upload files before submitting the form
        } else {
            this.submit(); // Submit form normally if no files
        }
    };
</script>

<!-- Dropzone JS -->
<script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>

@endsection
