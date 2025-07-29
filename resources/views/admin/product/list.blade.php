@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Products</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Status</th>
        <th>Feature</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td><img src="{{ asset('public/product/' . $product->image) }}" width="100px"></td>
        <td><input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product->status ? 'checked' : '' }}></td>
        <td><input data-id="{{$product->id}}" class="toggle-class-feature" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="yes" data-off="Not" {{ $product->featured ? 'checked' : '' }}></td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}
@endsection
@section('customJs')
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var cat_id = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route("product.changestatus")}}',
              data: {'status': status, 'id': cat_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

<script>
    $(function() {
      $('.toggle-class-feature').change(function() {
          var featured = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route("product.changeFeatured") }}',
              data: {'featured': featured, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

@endsection

