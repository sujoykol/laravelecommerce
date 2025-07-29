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
              <h3 class="card-title">Edit Slider Image</h3>
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
            <form  method="POST" action="{{ route('sliders.update',$slider->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="test" name="name" class="form-control"  placeholder="Name " value="{{ $slider->name}}">
                  @if($errors->has('name'))
                  <span class="text-danger"> {{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Detail</label>
                   <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $slider->detail}}</textarea>
                    @if($errors->has('detail'))
                    <span class="text-danger"> {{ $errors->first('detail') }}</span>
                    @endif
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slider Image</label>
                  <img src="{{ asset('public/slider/' . $slider->image) }}" width="100px">
                  <input type="file" name="image" class="form-control" />
                  @if($errors->has('image'))
                  <span class="text-danger"> {{ $errors->first('image') }}</span>
                  @endif
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
