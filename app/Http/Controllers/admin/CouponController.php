<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index(){
    $coupons = Coupon::latest()->paginate(10);
    //dd( $coupons);
    return view('admin.coupons.list', compact('coupons'));
   }
   public function create(){
    return view('admin.coupons.add');
   }
   public function store(Request $request)
{
    $request->validate([
        'code' => 'required|unique:coupons',
        'type' => 'required|in:fixed,percent',
        'value' => 'required|numeric|min:0',
        'usage_limit' => 'nullable|integer|min:1',
        'min_order_amount' => 'nullable|numeric|min:0',
        'expires_at' => 'nullable|date|after:today',
    ]);

    Coupon::create($request->only([
        'code', 'type', 'value', 'usage_limit', 'min_order_amount',
        'expires_at', 'applies_to_products', 'applies_to_categories', 'is_active'
    ]));

    return redirect()->route('coupons.index')->with('success', 'Coupon created.');
}


}
