@extends('layout.FacultyLayout')
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
                <h4 class="mb-sm-0">Book</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Book</li>
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
                        <h4>Book</h4>
                    </div>
                    <div class="col-3 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
                            Add Book!
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="course_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>PDF</th>
                            <th>PDF Image</th>
                            <th>Download Count</th>
                            <th>Action</th>
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
                    <form action="{{ url('/faculty/book/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="course_title">Course Title</label>
                        <input type="text" name="course_title" required class="form-control" placeholder="Enter the course_title">
                        @error('course_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="pdf">PDF Image</label>
                        <input type="file" name="pdf_image" required class="form-control">
                        @error('pdf')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="pdf">Upload Course PDF</label>
                        <input type="file" name="pdf" required class="form-control">
                        @error('pdf')
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
            var table = $('#course_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('book.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'course_title', name: 'course_title' },
                    { data: 'pdf', name: 'pdf' },
                    { data: 'PDFImage', name: 'PDFImage' },
                    { data: 'download_count', name: 'download_count', render: function(data, type, row) {
                        // Prepend "static student" to the download_count value
                        return data  + ' <span class="text-danger"> (Students)</span>' ;
                    }},
                    { data: 'action', name: 'action', orderable: false, searchable: true }
                ]
            });
        });
    </script>


@endsection()
