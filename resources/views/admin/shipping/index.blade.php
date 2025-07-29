@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Categories</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('admin/shipping/create') }}">+ Add Shipping Method</a>
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
        <th>Name</th><th>Type</th><th>Rate</th><th>Status</th><th>Actions</th>
    </tr>
    @foreach($methods as $method)
    <tr>
        <td>{{ $method->name }}</td>
        <td>{{ $method->type }}</td>
        <td>₹{{ $method->rate }}</td>
        <td><input data-id="{{$method->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $method->is_active ? 'checked' : '' }}></td>

        <td>

            <form method="POST" action="{{ route('shipping.destroy', $method->id) }}">

                <a href="{{ route('shipping.edit', $method->id) }}" class="btn btn-primary">Edit</a>
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



@endsection
@section('customJs')
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var cat_id = $(this).data('id');
          // alert(cat_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route("shippingStatus")}}',
              data: {'status': status, 'id': cat_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

@endsection

