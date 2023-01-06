<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                        <h1>No image</h1>
                        @endif
                        
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>
                        <div class="">
                        @if($product->productColors->count() > 0)
                            @if ($product->productColors)
                                @foreach ($product->productColors as $item)
                                {{-- <input type="radio" name="colorSelection" value="{{ $item->id }}"> {{ $item->color->name }} --}}
                                <label class="colorSelectionLabel text-white" style="background-color:{{ $item->color->code }};" wire:click="colorSelected({{ $item->id }})">
                                    {{ $item->color->name }}
                                </label>
                                @endforeach
                            @endif
                            <div>

                                @if ($this->prodColorSelectedQuantity == 'OutOfStock')
                                        <label class="btn py-1  btn-sm bg-danger text-white">Out Of Stock</label>
                                @elseif ($this->prodColorSelectedQuantity > 0)
                                        <label class="btn py-1 btn-sm bg-success text-white">In Stock</label>
                                @endif
                            </div>

                            @else
                                @if($product->quantity)
                                    <label class="btn py-1 btn-sm bg-success text-white">In Stock</label>
                                @else
                                    <label class="btn py-1  btn-sm bg-danger text-white">Out Of Stock</label>
                                @endif
                                
                        @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click='decrementQuantity'><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model='quantityCount' value="{{ $this->quantityCount }}" class="input-quantity"  readonly />
                                <span class="btn btn1" wire:click='incrementQuantity'><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click='addToCart' class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> Add To Wishlist 
                                </span>
                                <span wire:loading wire:target="addToWishlist">
                                    Adding..
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
