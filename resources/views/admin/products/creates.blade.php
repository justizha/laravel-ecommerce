@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-11 ">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Add Products
                            <a href="{{ url('admin/products') }}" class="btn btn-sm btn-primary text-white float-end">Back</a>
                        </h3>
                    </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    @foreach ($errors->all() as $error)
                                        <div class="">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">Seo Tags</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Detail</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Images</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Color</button>
                                    </li>
                                    
                                </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade border p-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <div class="mb-3 mt-3">
                                                <label>Category</label>
                                                <select name="category_id" class="form-control-sm">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Product Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Product Slug</label>
                                                <input type="text" name="slug" class="form-control">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label>Select Brand</label>
                                                <select name="brand" class="form-control-sm">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Small Description</label>
                                                <textarea class="form-control" name="small_description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                            <div class="mb-3">
                                                <label>Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Meta keyword</label>
                                                <textarea class="form-control" name="meta_keyword"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Meta_description</label>
                                                <textarea class="form-control" name="meta_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                            <div class="row mt-4">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Original Price</label>
                                                        <input type="text" name="original_price" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Selling Price</label>
                                                        <input type="text" name="selling_price" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Quanity</label>
                                                        <input type="number" name="quantity" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Trending</label>
                                                        <input type="checkbox" name="trending" style="width: 18px; height: 18px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Status</label>
                                                        <input type="checkbox" name="status" style="width: 18px; height: 18px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                            <div class="mb-3">
                                                <label>Upload Image</label>
                                                <input type="file" name="image[]" multiple class="form-control">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                            <div class="mb-3">
                                                <label>Select-Color</label>
                                                <hr>
                                                <div class="row">
                                                    @forelse ($colors as $color)
                                                    <div class="col-md-3"> 
                                                            <div class="p-2 border border-2 mb-3">
                                                                Color :<input type="checkbox" name="colors[]"  class="form-check" value="{{ $color->id }}">{{ $color->name }}
                                                                        <br>
                                                                Quantity : <input type="number" name="colorquantity[]" style="width: 60px; border:1px solid;">
                                                            </div>
                                                    </div>
                                                    @empty
                                                        <div class="col-md-12 text-center">
                                                            <h2 class="text-bold text-muted" >No Colors found</h2>
                                                        </div>
                                                    @endforelse
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary text-white" type="submit">Submit</button>
                                    </div> 
                            </form>
                        </div>
                </div>
            </div>
        </div>
@endsection