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
              <h3 class="card-title">Edit Payment setting </h3>
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

            <form method="POST" action="{{ route('admin.payment_settings.update') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                <h3>Cash on Delivery (COD)</h3>
                <input type="checkbox" class="form-control" name="enable_cod" {{ $settings->enable_cod ? 'checked' : '' }}> Enable COD
            </div>
            <div class="card-body">
                <h3>Stripe</h3>
                <input type="checkbox" class="form-control" name="enable_stripe" {{ $settings->enable_stripe ? 'checked' : '' }}> Enable Stripe<br>
                <input type="text" class="form-control" name="stripe_key" value="{{ $settings->stripe_key }}" placeholder="Stripe Key"><br>
                <input type="text" class="form-control" name="stripe_secret" value="{{ $settings->stripe_secret }}" placeholder="Stripe Secret">
            </div>
                <div class="card-body">
                <h3>Razorpay</h3>
                <input type="checkbox" class="form-control" name="enable_razorpay" {{ $settings->enable_razorpay ? 'checked' : '' }}> Enable Razorpay<br>
                <input type="text" class="form-control" name="razorpay_key" value="{{ $settings->razorpay_key }}" placeholder="Razorpay Key"><br>
                <input type="text" class="form-control" name="razorpay_secret" value="{{ $settings->razorpay_secret }}" placeholder="Razorpay Secret">
            </div>
                <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
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
