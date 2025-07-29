<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Slider;


class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', 1)->get();
        $banner = Banner::where('status', 1)->get();
        $products = Product:: where('featured', 1)->get();

        return view('fontend/home',["banners"=>$banner,"sliders"=> $slider,"products"=> $products]);

    }

    public function category(){

        return view('fontend/categoy');

    }

}
