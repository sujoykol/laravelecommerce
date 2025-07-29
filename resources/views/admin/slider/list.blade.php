@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Sliders</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('sliders.create') }}"> Create New Slider</a>
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
        <th>Image</th>
        <th>Name</th>
        <th>Details</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($sliders as $slider)
    <tr>

        <td>{{ ++$i }}</td>
        <td><img src="{{ asset('public/slider/' . $slider->image) }}" width="100px"></td>
        <td>{{ $slider->name }}</td>
        <td>{{ $slider->detail }}</td>
        <td><input data-id="{{$slider->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $slider->status ? 'checked' : '' }}></td>
        <td>
            <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('sliders.edit',$slider->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $sliders->links() !!}
@endsection
@section('customJs')
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var slider_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route("slider.changestatus")}}',
              data: {'status': status, 'id': slider_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

@endsection
