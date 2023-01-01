<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Add New Brand</h3>
                        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        <form wire:submit.prevent='storeBrand'>
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Brand Name</label>
                                    <input type="text" wire:model.defer='name' class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Brand Slug</label>
                                    <input type="text" wire:model.defer='slug' class="form-control">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Brand Status</label><br>
                                    <input type="checkbox" wire:model.defer='status' style="width: 70px;" class="form-check">
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer flex-column border-top-0">
                                <button type="button" wire:click='closeModal' class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                        </form>
            </div>
        </div>
</div>
{{-- update --}}
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Brand</h3>
                        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-4 ">
                    <div class="spinner-border text-primary text-center" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>
                <div wire:loading.remove>
                        <form wire:submit.prevent="updateBrand">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Brand Name</label>
                                    <input type="text" wire:model.defer='name' class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Brand Slug</label>
                                    <input type="text" wire:model.defer='slug' class="form-control">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Brand Status</label><br>
                                    <input type="checkbox" wire:model.defer='status' style="width: 70px;" class="form-check">
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer flex-column border-top-0">
                                <button type="button" class="btn btn-secondary w-100" wire:click='closeModal' data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
</div>
{{-- delete --}}
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h3>
                        <button type="button" class="btn-close" wire:click='closeModal' data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading class="p-4 ">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>
                <div wire:loading.remove>
                        <form wire:submit.prevent="destroyBrand">
                            @csrf
                            <h4>Are U Sure Want To Delete This Data?</h4>
                            <div class="modal-footer flex-column border-top-0">
                                <button type="button" class="btn btn-secondary w-100" wire:click='closeModal' data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger w-100">Delete</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
</div>

