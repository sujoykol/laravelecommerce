@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Reviews</h2>
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
        <th>User</th><th>Product</th><th>Rating</th><th>Comment</th><th>Status</th><th>Actions</th>
    </tr>
    @foreach($reviews as $review)
    <tr>
        <td>{{ $review->user->name }}</td>
        <td>{{ $review->product->name }}</td>
        <td>{{ $review->rating }}/5</td>
        <td>{{ $review->comment }}</td>
        <td>{{ $review->is_approved ? 'Approved' : 'Pending' }}</td>
        <td>
            @if(!$review->is_approved)
                <form method="POST" action="{{ route('admin.reviews.approve', $review->id) }}">
                    @csrf
                    <button type="submit">Approve</button>
                </form>
            @endif
            <form method="POST" action="{{ route('admin.reviews.destroy', $review->id) }}">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $reviews->links() !!}
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

