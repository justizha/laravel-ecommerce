<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
    public function removeWishlist(int $wishlistId)
    {
        // dd($wishlistId);
        Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        
        // session()->flash('message','Wishlist Item has Been Removed');s

        $this->dispatchBrowserEvent('message',[
            'text' => 'Wishlist Item has Been Removed',
            'type' => 'success',
            'status' => '200'
        ]);
    }
}
