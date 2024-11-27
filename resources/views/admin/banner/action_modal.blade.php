<div class="dropdown d-inline-block"><button class="btn btn-secondary btn-sm dropdown" type="button"
    data-bs-toggle="dropdown" aria-expanded="false">
    <i class="ri-more-fill align-middle"></i>
</button>
<ul class="dropdown-menu dropdown-menu-end">
    <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete{{ $data->id }}"
            class="dropdown-item edit-item-btn"><i class="ri-delete-bin-line"></i> &nbsp; Delete</a></li>
</ul>
</div>


<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Banner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Do you want to Delete Banner , All this dependencies will also be Deleted...
        </div>
        <div class="modal-footer">
            <form action="{{ route('banner.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-danger">Submit</button> --}}
                <input type="submit" value="Submit" class="btn btn-danger">
            </form>
        </div>

    </div>
</div>
</div>

