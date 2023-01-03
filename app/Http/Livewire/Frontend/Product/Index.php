<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{   
    public $products,$category,$brandInputs = [], $priceInput;

    protected $queryString = 
    [
        'brandInputs' => ['except' => '','as' =>  'brand'],
        'priceInput' => ['except' => '','as' =>  'price']
    ];
    

    public function mount($category)
    {
        
        $this->category = $category;
    }


    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                                    ->when($this->brandInputs,function ($qry){
                                        $qry->whereIn('brand',$this->brandInputs);
                                    })
                                    ->when($this->priceInput == 'high-to-low',function($qy){
                                        $qy->orderBy('selling_price','DESC');
                                    })->when($this->priceInput == 'low-to-high',function($qy){
                                        $qy->orderBy('selling_price','ASC');
                                    })
                                    ->where('status','0')
                                    ->get();
        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
