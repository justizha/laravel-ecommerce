<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category ,$product, $prodColorSelectedQuantity, $quantityCount = 1,$productColorId;

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id',$productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'OutOfStock';
        }
    }
    public function addToWishlist($productId)
    {
        // dd($productId);
        if(Auth::check())
        {
            // dd('ok');
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already Added');
                $this->dispatchBrowserEvent('message', ['newName' ,
                'text' => 'Alredy Added', 
                'type' => 'success',
                'status' => 409]);
                return false;
            }else
            {

                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wihlistAddedUpdated');
                session()->flash('message','Added Wishlist');
                $this->dispatchBrowserEvent('message', ['newName' ,
                'text' => 'Wislist Successfuly added', 
                'type' => 'success',
                'status' => 200]);
            }   
        }
        else{
            session()->flash('message','Please Login To Continue');
            $this->dispatchBrowserEvent('message', ['newName' ,
            'text' => 'Please Login To Continue', 
            'type' => 'info',
            'status' => 401
        ]);
            
            return false;
        }
    }

    public function mount($category,$product)
    {
        $this->category = $category;
        $this->product = $product;        
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1)
        {
            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 100){
            $this->quantityCount++;     
        }
        
    }

    public function addToCart(int $productId)
    {
        if (Auth::check())
        {
        // dd($productId);s
            if ($this->product->where('id',$productId)->where('status','0')->exists()) {
                //checking quantiy in a product color
            if($this->product->productColors()->count() > 1)
            {
                if ($this->prodColorSelectedQuantity != NULL) {
                    if(Cart::where('user_id',auth()->user()->id)
                            ->where('product_id',$productId)
                            ->where('product_color_id',$this->productColorId)
                            ->exists())
                        {
                            $this->dispatchBrowserEvent('message', ['newName' ,
                                'text' => 'Product alredy added', 
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                        else
                        {
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                                if ($productColor->quantity > 0) 
                                {
                                    if($this->product->quantity > 0 )
                                    {
                                        if($productColor->quantity > $this->quantityCount )
                                        {
                                            // Insert
                                            Cart::create([
                                                'user_id' => auth()->user()->id,
                                                'product_id' => $productId,
                                                'product_color_id' => $this->productColorId,
                                                'quantity' => $this->quantityCount
                                            ]);
                                            $this->emit('CartAddedUpdated');
                                            $this->dispatchBrowserEvent('message',['newName',
                                            'text' =>'Added To Cart',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                        }
                                        else
                                        {
                                            $this->dispatchBrowserEvent('message', ['newName' ,
                                            'text' => 'Only'.$this->product->quantity.'quantity available', 
                                            'type' => 'warning',
                                            'status' => 404
                                            ]);
                                        }
                                    }
                                }   
                                else{
                                    $this->dispatchBrowserEvent('message', ['newName' ,
                                    'text' => 'Out of Stock', 
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                                }
                            }
                            }else{
                                $this->dispatchBrowserEvent('message', ['newName' ,
                                    'text' => 'Please Select Your Product Color', 
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }else
                        {
                        if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                        {
                            $this->dispatchBrowserEvent('message', ['newName' ,
                            'text' => 'Product alredy added', 
                            'type' => 'success',
                            'status' => 200
                        ]);
                        }
                        else{
                            if($this->product->quantity > 0 ){
                                    if($this->product->quantity > $this->quantityCount ){
                                        // Insert
                                            Cart::create([
                                                    'user_id' => auth()->user()->id,
                                                    'product_id' => $productId, 
                                                    'quantity' => $this->quantityCount
                                                ]);
                                                $this->emit('CartAddedUpdated');
                                                $this->dispatchBrowserEvent('message',['newName',
                                                'text' =>'Added To Cart',
                                                'type' => 'success',
                                                'status' => 200
                                            ]);
                                        }
                                        else {
                                            $this->dispatchBrowserEvent('message', ['newName' ,
                                            'text' => 'Only'.$this->product->quantity.'quantity available', 
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                    }
                                }
                            else {
                                $this->dispatchBrowserEvent('message', ['newName' ,
                                'text' => 'Out Of stock !', 
                                'type' => 'warning',
                                'status' => 404
                            ]);
                            }
                        }
                    }
                }
                else{
                    $this->dispatchBrowserEvent('message', ['newName' ,
                    'text' => 'Product Does Not Exists', 
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', ['newName' ,
            'text' => 'Please Login To Continue', 
            'type' => 'info',
            'status' => 401
        ]);
        }
        
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
