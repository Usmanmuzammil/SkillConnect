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
                        <li class="breadcrumb-item active">Project</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h4>Project</h4>
                    </div>
                    <div class="col-3 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
                            Add Project!
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="project_table">
                    <thead>
                        <tr>
                            <th scope="6">Id</th>
                            <th scope="6">Title</th>
                            <th scope="6">Description</th>
                            <th scope="6">Image</th>
                            <th scope="6">Price</th>
                            <th scope="6">Uploaded By</th>
                            <th scope="6">WhatsApp Number</th>
                            <th scope="6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/course/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="course_title">Course Title</label>
                        <input type="text" name="course_title" required class="form-control" placeholder="Enter the course_title">
                        @error('course_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="link">Link</label>
                        <input type="text" name="link" required class="form-control" placeholder="Enter the link">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="price">Price</label>
                        <input type="text" name="price" required class="form-control" placeholder="Enter the price">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div>
                            <label for="hours">Hours</label>
                            <input type="number" name="hours" min="0" class="form-control" placeholder="Hours" required>
                        </div>
                        <div>
                            <label for="minutes">Minutes</label>
                            <input type="number" name="minutes" min="0" max="59" class="form-control" placeholder="Minutes" required>
                        </div>
                        @error('hours')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('minutes')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                        <label for="whatsapp_num">WhatsApp Number</label>
                        <input type="number" name="whatsapp_num" required class="form-control" placeholder="0300-0000000">
                        @error('whatsapp_num')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">Image</label>
                        <input type="file" name="image" required class="form-control">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            var table = $('#project_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('project.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    { data: 'Image', name: 'Image' },
                    { data: 'price', name: 'price' },
                    { data: 'UploadedBy', name: 'UploadedBy' },
                    { data: 'whatsapp_num', name: 'whatsapp_num' },
                    { data: 'action', name: 'action', orderable: false, searchable: true }
                ]
            });
        });
    </script>


@endsection()
