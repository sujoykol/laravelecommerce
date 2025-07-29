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
              <h3 class="card-title">Setting</h3>
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
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                <label>Store Name</label>
                <input type="text" name="store_name" class="form-control" value="{{ old('store_name', $setting->store_name) }}">
                </div>
                <div class="form-group">
                <label>Contact Email</label>
                <input type="email" name="contact_email"  class="form-control" value="{{ old('contact_email', $setting->contact_email) }}">
            </div>
            <div class="form-group">
                <label>Contact Phone</label>
                <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $setting->contact_phone) }}">
            </div>
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $setting->facebook) }}">

                <label>Twitter</label>
                <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $setting->twitter) }}">

                <label>Instagram</label>
                <input type="text" name="instagram"  class="form-control" value="{{ old('instagram', $setting->instagram) }}">
                <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
                @if($setting->logo)
                    <img src="{{ asset('storage/app/public/' . $setting->logo) }}" width="100">
                @endif
            </div>
                <div class="form-group">
                <label>Favicon</label>
                <input type="file" name="favicon" class="form-control">
                @if($setting->favicon)
                    <img src="{{ asset('storage/app/public/' . $setting->favicon) }}" width="32">
                @endif
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
