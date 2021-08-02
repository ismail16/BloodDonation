<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin.slider.all', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);
        
        $image = $request->file('image');
        if (isset($image)) {
            $imagename = 'slider'.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/slider')) {
                mkdir('images/slider', 777 , true);
            }
            $image->move('images/slider',$imagename);
        }

        $image = new Slider();
        $image->image = $imagename;
        $image->status = $request->status;
        $image->save();

        return redirect()->route('admin.slider.index')->with('success','Successfully Added!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $image = $request->file('image');
        if (isset($image)) {
            if (file_exists('images/slider/'.$slider->image)) {
               unlink('images/slider/'.$slider->image);
            }
            $imagename = 'slider'.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/slider')) {
                mkdir('images/slider', 777 , true);
            }
            $image->move('images/slider',$imagename);
        }else{
            $imagename = $slider->image;
        }

        
        $slider->image = $imagename;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('success','Successfully Updated!');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (file_exists('images/slider/'.$slider->image)) {
            unlink('images/slider/'.$slider->image);
        }
        $slider->delete();
        return back()->with('success','Successfully Deleted!');
    }
}
