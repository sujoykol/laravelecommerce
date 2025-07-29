<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;

class PaymentSettingController extends Controller
{
    public function edit()
{
    $settings = PaymentSetting::first() ?? new PaymentSetting();
    return view('admin.payment_settings.edit', compact('settings'));
}

public function update(Request $request)
{
    $request->validate([
        'stripe_key'        => 'nullable|string|required_if:enable_stripe,on',
        'stripe_secret'     => 'nullable|string|required_if:enable_stripe,on',

        'razorpay_key'      => 'nullable|string|required_if:enable_razorpay,on',
        'razorpay_secret'   => 'nullable|string|required_if:enable_razorpay,on',

        'enable_cod'        => 'nullable|in:on',
        'enable_stripe'     => 'nullable|in:on',
        'enable_razorpay'   => 'nullable|in:on',
    ], [
        'stripe_key.required_if'      => 'Stripe key is required when Stripe is enabled.',
        'stripe_secret.required_if'   => 'Stripe secret is required when Stripe is enabled.',
        'razorpay_key.required_if'    => 'Razorpay key is required when Razorpay is enabled.',
        'razorpay_secret.required_if' => 'Razorpay secret is required when Razorpay is enabled.',
    ]);

    $settings = PaymentSetting::first() ?? new PaymentSetting();

    $settings->enable_cod = $request->has('enable_cod');
    $settings->enable_stripe = $request->has('enable_stripe');
    $settings->stripe_key = $request->stripe_key;
    $settings->stripe_secret = $request->stripe_secret;

    $settings->enable_razorpay = $request->has('enable_razorpay');
    $settings->razorpay_key = $request->razorpay_key;
    $settings->razorpay_secret = $request->razorpay_secret;

    $settings->save();

    return back()->with('success', 'Payment settings updated.');
}
}
