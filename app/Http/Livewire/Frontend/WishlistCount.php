<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $WishlistCount;

    protected $listeners = ['wihlistAddedUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if(Auth::check())
        {
            return $this->WishlistCount = Wishlist::where('user_id',auth()->user()->id)->count();
        }else{
            return $this->WishlistCount = 0;
        }
    }

    public function render()
    {
        $this->WishlistCount = $this->checkWishlistCount(   );
        return view('livewire.frontend.wishlist-count',[
            'WishlistCount' => $this->WishlistCount
        ]);
    }
}
