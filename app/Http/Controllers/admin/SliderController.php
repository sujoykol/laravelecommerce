<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $slider = Slider::latest()->paginate(5);
       return view('admin.slider.list',['sliders'=>$slider])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.slider.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            "name"=>"required",
            "detail"=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = public_path('slider');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        Slider::create($input);
        return redirect()->route('sliders.index')
                        ->with('success','Slider created successfully.');


    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            "name"=>"required",
            "detail"=>'required',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {

            $imagePath = public_path('slider/' . $slider->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $destinationPath = public_path('slider');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        else
        {
            unset($input['image']);
        }
        $slider->update($input);
        return redirect()->route('sliders.index')
                        ->with('success','Slider updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        $imagePath = public_path('slider/' . $slider->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        return redirect()->route('sliders.index')
                        ->with('success','Sliders deleted successfully');
    }

    public function changeStatus(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->status = $request->status;
        $slider->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}

