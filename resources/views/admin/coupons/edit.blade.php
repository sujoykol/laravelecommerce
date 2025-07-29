@extends('admin.layout.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard v3</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v3</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Category </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @include("admin.layout.messages")
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{  route('admin.coupons.update', $coupon->id) }}">
                @csrf
                @method('PUT')

                <input name="code" value="{{ old('code', $coupon->code ?? '') }}" placeholder="Coupon Code" required>

                <select name="type" required>
                    <option value="fixed">Fixed</option>
                    <option value="percent">Percentage</option>
                </select>

                <input name="value" type="number" step="0.01" required value="{{ old('value', $coupon->value ?? '') }}">

                <input name="usage_limit" type="number" placeholder="Max uses" value="{{ old('usage_limit', $coupon->usage_limit ?? '') }}">

                <input name="min_order_amount" type="number" step="0.01" placeholder="Min Order Amount" value="{{ old('min_order_amount', $coupon->min_order_amount ?? '') }}">

                <input name="expires_at" type="date" value="{{ old('expires_at', isset($coupon->expires_at) ? $coupon->expires_at->format('Y-m-d') : '') }}">

                <textarea name="applies_to_products" placeholder="Comma-separated product IDs">{{ old('applies_to_products', implode(',', $coupon->applies_to_products ?? [])) }}</textarea>

                <textarea name="applies_to_categories" placeholder="Comma-separated category IDs">{{ old('applies_to_categories', implode(',', $coupon->applies_to_categories ?? [])) }}</textarea>

                <label>
                    <input type="checkbox" name="is_active" value="1" {{ isset($coupon) && $coupon->is_active ? 'checked' : '' }}> Active
                </label>

                <button type="submit">Save Coupon</button>
            </form>

          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection
