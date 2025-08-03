<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Setting;



class HomepageController extends Controller
{

    public function index()
    {
        $sliders = Slider::select('id', 'name', 'detail', 'image')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        // Format the image path as full URL
        foreach ($sliders as $slider) {
            $slider->image = url('public/slider/' . $slider->image);
        }

        return response()->json($sliders);
    }
    public function featureproduct()
    {

        $products = Product::select('id', 'name', 'slug', 'price', 'image')
            ->where('featured', 1)
            ->latest()   // orders by created_at DESC
            ->take(6)    // limits to 3 results
            ->get();
        foreach ($products as $product) {
            $product->image = url('public/product/' . $product->image);
        }

        return response()->json($products);
    }

    public function randomProducts()
    {

        $products = Product::select('id', 'name', 'slug', 'price', 'image')
            ->inRandomOrder()
            ->take(3)
            ->get();
        foreach ($products as $product) {
            $product->image = url('public/product/' . $product->image);
        }

        return response()->json($products);
    }

    public function brandslider()
    {
        $banners = Banner::where('status', '1')->get();

        foreach ($banners as $banner) {
            $banner->image = url('public/banner/' . $banner->image);
        }

        return response()->json($banners);
    }
    public function products()
    {
        $products = Product::where('status', 1)->get();
        foreach ($products as $product) {
            $product->image = url('public/product/' . $product->image);
        }

        return response()->json($products);
    }
    public function siteSetting()
    {
        $setting = Setting::first();
        if ($setting) {
            $setting->logo = url('storage/app/public/logos/' . $setting->logo);
            return response()->json($setting);
        } else {
            return response()->json(['error' => 'Settings not found'], 404);
        }
    }
}
