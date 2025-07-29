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
              <h3 class="card-title">Create Category</h3>
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
            <div class="card-body">
            <form method="POST" action="{{ route('shipping.update', $method->id)}}">
                @csrf
                @if(isset($method)) @method('PUT') @endif
                <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $method->name ?? old('name') }}" placeholder="Shipping Name" required>
            </div>
                <div class="form-group">
                <select name="type" required class="form-control">
                    <option value="flat_rate">Flat Rate</option>
                    <option value="free">Free Shipping</option>
                    <option value="region_based">Region Based</option>
                    <option value="weight_based">Weight Based</option>
                    <option value="price_based">Price Based</option>
                </select>
            </div>
                <div class="form-group">
                <input type="number" name="rate" step="0.01" class="form-control" value="{{ $method->rate ?? old('rate') }}" required>
            </div>
                <div class="form-group">
                <textarea class="form-control" name="rules">{{ $method->rules ? json_encode($method->rules) : '' }}</textarea>
            </div>


                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

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
