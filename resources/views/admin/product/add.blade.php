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
              <h3 class="card-title">Create Product</h3>
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
            <form  method="POST" action={{ route('products.store')}} enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="test" name="name" class="form-control"  placeholder="Name" value="{{ old('name')}}">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category_id" class="form-control">
                    <option value="">--Select Category---</option>
                    @foreach ($cat as $c)
                    <option value="{{ $c->id}}">{{ $c->name}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="test" name="price" class="form-control"  placeholder="Price" value="{{ old('price')}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Stock</label>
                    <input type="test" name="stock" class="form-control"  placeholder="Stock" value="{{ old('stock')}}">
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" id="editor" style="height:150px" name="description" placeholder="Detail"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> Image</label>
                    <input type="file" name="image" class="form-control" />

                  </div>

                  <h5 class="mt-4">Product Options</h5>
        <div id="option-container">
            <div class="option-group border p-3 mb-3 rounded">
                <div class="form-group">
                    <label>Option Name</label>
                    <input type="text" class="form-control" name="options[0][name]" placeholder="e.g., Color" required>
                </div>
                <div class="form-group values-group">
                    <label>Values</label>
                    <div class="input-group mb-2 value-group">
                        <input type="text" class="form-control" name="options[0][values][]" placeholder="e.g., Red" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-danger remove-value">🗑️</button>
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-between mt-2">
                    <button type="button" class="btn btn-sm btn-secondary add-value">+ Add Value</button>
                    <button type="button" class="btn btn-sm btn-danger remove-option">🗑️ Remove Option</button>
                </div>
            </div>
        </div>

        <button type="button" id="add-option" class="btn btn-info mb-3">+ Add Another Option</button>




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
  @section('customJs')
  <script>
    let optionIndex = 1;

    document.getElementById('add-option').addEventListener('click', function () {
        const container = document.getElementById('option-container');
        const html = `
            <div class="option-group border p-3 mb-3 rounded">
                <div class="form-group">
                    <label>Option Name</label>
                    <input type="text" class="form-control" name="options[${optionIndex}][name]" placeholder="e.g., Size" required>
                </div>
                <div class="form-group values-group">
                    <label>Values</label>
                    <div class="input-group mb-2 value-group">
                        <input type="text" class="form-control" name="options[${optionIndex}][values][]" placeholder="e.g., M" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-danger remove-value">🗑️</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <button type="button" class="btn btn-sm btn-secondary add-value">+ Add Value</button>
                    <button type="button" class="btn btn-sm btn-danger remove-option">🗑️ Remove Option</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        optionIndex++;
    });

    // Handle dynamic actions
    document.addEventListener('click', function (e) {
        // Add value input
        if (e.target && e.target.classList.contains('add-value')) {
            const group = e.target.closest('.option-group');
            const valuesGroup = group.querySelector('.values-group');
            const optionName = group.querySelector('input').name;
            const baseName = optionName.replace('[name]', '[values][]');

            const newValueInput = `
                <div class="input-group mb-2 value-group">
                    <input type="text" class="form-control" name="${baseName}" placeholder="e.g., Value" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-danger remove-value">🗑️</button>
                    </div>
                </div>`;
            valuesGroup.insertAdjacentHTML('beforeend', newValueInput);
        }

        // Remove value input
        if (e.target && e.target.classList.contains('remove-value')) {
            e.target.closest('.value-group').remove();
        }

        // Remove entire option
        if (e.target && e.target.classList.contains('remove-option')) {
            e.target.closest('.option-group').remove();
        }
    });
    </script>


  @endsection
