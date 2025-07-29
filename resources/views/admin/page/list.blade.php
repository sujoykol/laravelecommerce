@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Pages</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('pages.create') }}"> Create New Page</a>
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
        <th>Status</th>

        <th width="280px">Action</th>
    </tr>
    @foreach ($pages as $page)
    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $page->name }}</td>
        <td><input data-id="{{$page->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $page->status ? 'checked' : '' }}></td>
        <td>
            <form action="{{ route('pages.destroy',$page->id) }}" method="POST">


                <a class="btn btn-primary" href="{{ route('pages.edit',$page->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $pages->links() !!}
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
              url: '{{ route("pageStatus")}}',
              data: {'status': status, 'id': cat_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

@endsection

