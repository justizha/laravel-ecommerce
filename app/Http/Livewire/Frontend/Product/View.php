<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category ,$product, $prodColorSelectedQuantity, $quantityCount = 1;

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
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

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
