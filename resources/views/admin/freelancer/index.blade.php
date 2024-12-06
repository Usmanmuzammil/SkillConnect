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
                        <li class="breadcrumb-item active">Freelancer</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="col-12">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h4>Freelancer</h4>
                    </div>
                    <div class="col-3 text-end">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
                            Add Instructors!
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="card-body" style="width: 100%;">
                <!-- Make table responsive -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="Faculty_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Country</th>
                                <th>Year of Experience</th>
                                <th>Facebook Link</th>
                                <th>YouTube Link</th>
                                <th>Twitter Link</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
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
                    <form action="{{ url('/admin/teacher/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" required class="form-control" placeholder="Enter the name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="email">Email</label>
                        <input type="text" name="email" required class="form-control" placeholder="Enter the xyz@gmail.com">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="description">Description</label>
                        {{-- <input type="text" name="description" required class="form-control" placeholder="Enter the xyz@gmail.com"> --}}
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter the description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="desgination">Desgination</label>
                        {{-- <input type="text" name="desgination_id" required class="form-control" placeholder="Enter the desgination"> --}}
                        <input type="text" name="desgination" id="" class="form-control" placeholder="Enter the Desgination">
                        @error('desgination')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="facebooklink">Facebook Link <span class="text-danger">(Optional)</span></label>
                        <input type="text" name="facebook_link" class="form-control" placeholder="https://www.facebook.com/profile.php?id=10">
                        @error('facebooklink') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="youtubelink">Youtube Link<span class="text-danger">(Optional)</span></label>
                        <input type="text" name="youtube_link" class="form-control" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        @error('youtubelink')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="twitterlink">Twitter Link<span class="text-danger">(Optional)</span></label>
                        <input type="text" name="twitter_link" class="form-control" placeholder="https://twitter.com/username">
                        @error('twitterlink')
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
            var table = $('#Faculty_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('freelancer.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'category', name: 'category' },
                    { data: 'country', name: 'country' },
                    { data: 'year_of_experience', name: 'year_of_experience'},
                    { data: 'facebook_link', name: 'facebook_link'},
                    { data: 'youtube_link', name: 'youtube_link'},
                    { data: 'twitter_link', name: 'twitter_link'},
                    { data: 'image', name: 'image' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: true }
                ]
            });
        });
    </script>


@endsection()
