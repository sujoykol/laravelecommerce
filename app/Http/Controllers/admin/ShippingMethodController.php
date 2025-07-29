<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;

class ShippingMethodController extends Controller
{


public function index()
{
    $methods = ShippingMethod::all();
    return view('admin.shipping.index', compact('methods'));
}

public function create()
{
    return view('admin.shipping.add');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required|in:flat_rate,free,region_based,weight_based,price_based',
        'rate' => 'required|numeric|min:0',
    ]);

    ShippingMethod::create($request->only('name', 'type', 'rate', 'rules', 'is_active'));

    return redirect()->route('admin.shipping.index')->with('success', 'Shipping method added.');
}

public function edit($id)
{
    $method = ShippingMethod::findOrFail($id);
    return view('admin.shipping.edit', compact('method'));
}

public function update(Request $request, $id)
{
    $method = ShippingMethod::findOrFail($id);
    $method->update($request->only('name', 'type', 'rate', 'rules'));

    return redirect()->route('shipping.index')->with('success', 'Shipping method updated.');
}

public function destroy($id)
{
    ShippingMethod::findOrFail($id)->delete();
    return back()->with('success', 'Shipping method deleted.');
}

public function changeStatus(Request $request)
    {
        $shipping = ShippingMethod::find($request->id);
        $shipping->is_active = $request->status;
        $shipping->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}

