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
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <h5 class="text-danger md-3 py-3">*** Please add the three entity! ***</h5>
    <div class="col-12 mt-1">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h4>Banner</h4>
                    </div>
                    <div class="col-3 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
                            Add Banner!
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="banner_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
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
                    <form action="{{ url('/admin/banner/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="tagline">Tagline</label>
                        <input type="text" name="tagline" required class="form-control" placeholder="Enter the tagline">
                        @error('tagline')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="description">Description</label>
                        <span class="text-danger">*Set the description in 100 letters*</span>
                        <input type="text" name="description" id="description" required class="form-control" placeholder="Enter the description" maxlength="100">
                        <!-- Character count display -->
                        <div id="charCount" class="mt-2 text-muted">0/100</div>
                        
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="image">Image</label>
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
            var table = $('#banner_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('banner.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tagline', name: 'tagline' },
                    { data: 'description', name: 'description' },
                    { data: 'image', name: 'image' },
                    { data: 'action' , name: 'action',orderable: false, searchable: true }
                ]
            });
        });
    </script>


@endsection()
{{-- <script>
    document.getElementById('description').addEventListener('input', function() {
        // Get the current length of the input
        var currentLength = this.value.length;
        var maxLength = 100;

        // Update the character count
        document.getElementById('charCount').textContent = currentLength + '/' + maxLength;

        // Optional: Change color of the text when limit is near (e.g., 90 or more)
        if (currentLength >= 90) {
            document.getElementById('charCount').style.color = 'red';
        } else {
            document.getElementById('charCount').style.color = 'gray';
        }
    }); --}}
