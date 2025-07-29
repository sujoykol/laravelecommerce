@extends('admin.layout.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard v3</h1>
        </div><!-- /.col -->
        <!-- /.col -->
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
              <h3 class="card-title">Create Coupon</h3>
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

            <form method="POST" action="{{ route('coupons.store') }}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                <input name="code" value=" " class="form-control" placeholder="Coupon Code" >
                </div>
                <div class="form-group">
                <select name="type" required class="form-control">
                    <option value="fixed">Fixed</option>
                    <option value="percent">Percentage</option>
                </select>
                </div>
                <div class="form-group">
                <input name="value" type="number" step="0.01" required value="" class="form-control">
            </div>
            <div class="form-group">
                <input name="usage_limit" type="number" class="form-control" placeholder="Max uses" value="">
            </div>
            <div class="form-group">
                <input name="min_order_amount" type="number" class="form-control" step="0.01" placeholder="Min Order Amount" value="">
            </div>
            <div class="form-group">
                <input name="expires_at" type="date" value=" " class="form-control">
            </div>
            <div class="form-group">
                <textarea name="applies_to_products"  class="form-control" placeholder="Comma-separated product IDs"></textarea>
            </div>
                <div class="form-group">
                <textarea name="applies_to_categories"   class="form-control" placeholder="Comma-separated category IDs"></textarea>
            </div>
                <label>
                    <input type="checkbox" name="is_active" value="1"  class="form-control"> Active
                </label>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Coupon</button>
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
