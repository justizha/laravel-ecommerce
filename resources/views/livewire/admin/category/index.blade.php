<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <form wire:submit.prevent='destroyCategory'>
                            <div class="modal-body">
                                <h5>Are U Sure Want To Delete This Data ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    @if (session('message'))
                        
                        <h2 class="alert alert-success">{{ session('message') }}</h2>
                    @endif
                    <h3>
                        Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-primary float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1' ? 'Hidden':'Vissible'}}</td>
                                <td>
                                    <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" wire:click='deleteCategory({{ $category->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <td colspan="5">No Category Found</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="">

                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    
    <script>
        window.addEventListener('close-modal',event => {
            $('#deleteModal').modal('hide')
        });
    </script>


@endpush