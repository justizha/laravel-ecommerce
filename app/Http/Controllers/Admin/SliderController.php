<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }
    
    public function create()
    {
        
        return view('admin.sliders.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1':'0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' =>$validatedData['image'],
            'status' => $validatedData['status']

        ]);

        return redirect('admin/sliders')->with('message','slider added successfully');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){

            $destination = $slider->image;
            if (File::exists($destination)) {
                FIle::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1':'0';
        
        Slider::where('id',$slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $validatedData['status']

        ]);

        return redirect('admin/sliders')->with('message','slider Updated successfully');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->count() > 0) {
        
            $destination = $slider->image;
                if (File::exists($destination)) {
                    FIle::delete($destination);
                }
            $slider->delete();  

            return redirect('admin/sliders')->with('message','slider Deleted successfully');
        }
            return redirect('admin/sliders')->with('message','slider Deleted failed');

    }
}
