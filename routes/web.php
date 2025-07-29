<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\PaymentSettingController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\ShippingMethodController;
use App\Http\Controllers\admin\CouponController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController:: class, 'index']);
Route::get('/category',[HomeController:: class, 'category']);

Route::get('admin/login',[AuthController:: class, 'index'])->name('admin.login');
Route::post('admin/login',[AuthController:: class, 'auth_admin_login'])->name('admin.auth_admin_login');


Route::group(['middleware' =>'admin'],function () {
        Route::resource('admin/category', CategoryController::class);
        Route::resource('admin/sliders', SliderController::class);
        Route::resource('admin/banners', BannerController::class);
        Route::resource('admin/products', ProductController::class);
        Route::resource('admin/pages', PageController::class);
        Route::resource('admin/shipping', ShippingMethodController::class);
        Route::resource('admin/coupons', CouponController::class);
        Route::get('admin/changeStatus', [CategoryController:: class, 'changeStatus'])->name('changeStatus');
        Route::get('admin/pageStatus', [PageController:: class, 'changeStatus'])->name('pageStatus');
        Route::get('admin/shippingStatus', [ShippingMethodController:: class, 'changeStatus'])->name('shippingStatus');
        Route::get('admin/sliderstatus', [SliderController:: class, 'changeStatus'])->name('slider.changestatus');
        Route::get('admin/bannerstatus', [BannerController:: class, 'changeStatus'])->name('banner.changestatus');
        Route::get('admin/productstatus', [ProductController:: class, 'changeStatus'])->name('product.changestatus');
        Route::get('admin/changeFeatured', [ProductController:: class, 'changeFeatured'])->name('product.changeFeatured');
        Route::get('admin/dashborad',[AuthController:: class, 'dashborad'])->name('admin.dashboard');
		Route::get('admin/changepassword',[AuthController:: class, 'changepassword'])->name('admin.setting');
        Route::post('admin/postchangepassword',[AuthController:: class, 'postchangepassword'])->name('admin.changepassword');
        Route::get('admin/logout',[AuthController:: class, 'admin_logout'])->name('admin.logout');
        Route::get('admin/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
        Route::post('reviews/{id}/approve', [ReviewController::class, 'approve'])->name('admin.reviews.approve');
        Route::delete('reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
        Route::get('admin/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::post('admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        Route::get('admin/orders/{id}/invoice', [OrderController::class, 'downloadInvoice'])->name('admin.orders.invoice');
        Route::get('admin/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
        Route::post('admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');
        Route::get('admin/payment-settings', [PaymentSettingController::class, 'edit'])->name('payment_settings.edit');
       Route::post('admin/payment-settings', [PaymentSettingController::class, 'update'])->name('admin.payment_settings.update');

});


