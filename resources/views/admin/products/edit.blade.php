@extends('layouts.admin')

@section('content')
<div class="row">
            <div class="col-md-11 ">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Edit a Products
                            <a href="{{ url('admin/products') }}" class="btn btn-sm btn-primary text-white float-end">Back</a>
                        </h3>
                    </div>
                        <div class="card-body">
                            @if (session('message'))
                                <h4 class="">{{ session('message') }}</h4>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    @foreach ($errors->all() as $error)
                                        <div class="">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                        <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false">Color</button>
                                    </li>
                                    
                                </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade border p-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                            <div class="mb-3 mt-3">
                                                <label>Category</label>
                                                <select name="category_id" class="form-control-sm">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':''}}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Product Name</label>
                                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Product Slug</label>
                                                <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label>Select Brand</label>
                                                <select name="brand" class="form-control-sm">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':''}}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>Small Description</label>
                                                <textarea class="form-control" name="small_description">{{ $product->small_description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                            <div class="mb-3">
                                                <label>Meta Title</label>
                                                <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Meta keyword</label>
                                                <textarea class="form-control" name="meta_keyword">{{ $product->meta_keyword }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label>Meta_description</label>
                                                <textarea class="form-control" name="meta_description">{{ $product->meta_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                            <div class="row mt-4">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Original Price</label>
                                                        <input type="text" name="original_price" value="{{ $product->original_price }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Selling Price</label>
                                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Quanity</label>
                                                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Trending</label>
                                                        <input type="checkbox" name="trending" value="{{ $product->trending == '1' ?'checked':''  }}" style="width: 18px; height: 18px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label>Status</label>
                                                        <input type="checkbox" name="status" value="{{ $product->status == '1' ?'checked':''  }} style="width: 18px; height: 18px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                            <div class="mb-3">
                                                <label>Upload Image</label>
                                                <input type="file" name="image[]" multiple class="form-control">
                                            </div>
                                            <div class="">
                                                @if ($product->productImages)
                                                    <div class="row">
                                                        @foreach ($product->productImages as $image)
                                                        <div class="col-md-2">
                                                                <img src="{{ asset($image->image) }}" alt="" width="80px" class="me-4 border">
                                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block text-decoration-none">Remove</a>
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <h5 class="text-muted">No Image added</h5>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade border p-3" id="colors-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                            <div class="mb-3">
                                                <h4>Add A Color</h4>
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
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Color-Name</th>
                                                            <th>Quantity</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($product->productColors as $product)
                                                        <tr class="product-color-tr">
                                                            <td>
                                                                @if ($product->color)
                                                                    {{ $product->color->name }}
                                                                @else
                                                                    No color Founds
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="input-group mb-3" style="width: 150px;">
                                                                    <input type="text" value="{{ $product->quantity }}" class="productColorQuantity form-control form-control-sm">
                                                                    <button class="updateProductColorBtn btn btn-primary btn-sm text-white" type="button" value="{{ $product->id }}">Update</button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <Button class="deleteProductColorBtn btn btn-danger btn-sm text-white" type="button" value="{{ $product->id }}">Delete</Button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-facebook text-white" type="submit">Update</button>
                                    </div> 
                            </form>
                        </div>
                </div>
            </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $(document).on('click','.updateProductColorBtn',function (){

                var product_id = "{{ $product->id }}"
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();
                //alert(prod_color_id); 

                if(qty <= 0){
                    alert('Quantity Is Required')
                    return false;
                }
                
                var data = {
                    'product_id': product_id,
                    'qty':qty
                };

                $.ajax({
                    type:"POST",
                    url:"/admin/product-color/"+prod_color_id,
                    data:data,
                    success: function(response){
                        alert(response.message)
                    }
                });
            });
            $(document).on('click','.deleteProductColorBtn',function (){
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                        
                
                $.ajax({
                    type: "GET",
                    url:"/admin/product-color/"+prod_color_id"/delete",
                    success:function(response){
                        thisClick.closest('.product-color-tr').remove();
                        alert(response.message);
                    }
                });
            });
        });
    </script>
@endsection