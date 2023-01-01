<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brand List 
                        <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"    data-bs-target="#addBrandModal">Add New Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'hidden':'vissible'}}</td>
                                <td>
                                    <a href="#" wire:click='editBrand({{ $brand->id }})' data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" data-bs-toggle="modal" wire:click='deleteBrand({{ $brand->id }})' data-bs-target="#deleteBrandModal" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <td colspan="5">No brands found</td>
                            @endforelse
                            
                        </tbody>
                    </table>
                    <div class="">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    
    <script>
        window.addEventListener('close-modal',event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>

@endpush

