<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {   
            if($cartData->productColor()->where('id',$cartData->prod_color_id)->exists()){

                $productColor = $cartData->productColor()->where('id',$cartData->prod_color_id)->first();
                if($productColor->quantity > $cartData->quantity){

                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Quantiy Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }else{
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Only' .$productColor->quantity. 'Quantity Avalible',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }
            }else{

                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Quantiy Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }else{
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Only' .$cartData->product->quantity. 'Quantity Avalible',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }
            }

            
        }else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Something Went Wrong :(',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData)
        {   
            if($cartData->productColor()->where('id',$cartData->prod_color_id)->exists()){

                $productColor = $cartData->productColor()->where('id',$cartData->prod_color_id)->first();
                if($productColor->quantity > $cartData->quantity){

                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Quantiy Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }else{
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Only' .$productColor->quantity. 'Quantity Avalible',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }
            }else{

                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Quantiy Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }else{
                    $this->dispatchBrowserEvent('message',[
                        'text' => 'Only' .$cartData->product->quantity. 'Quantity Avalible',
                        'type' => 'success',
                        'status' => 200
                    ]);     
                }
            }

            
        }else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Something Went Wrong :(',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function removeCartItem(int $cartId )
    {
        $cartRemoveData = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData){
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message',[
                'text' => 'Cart Item Has Removed',
                'type' => 'success',
                'status' => 200
            ]);
        }else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'Cart Item Not Found :(',
                'type' => 'warning',
                'status' => 500
            ]);
        }
    }
}
