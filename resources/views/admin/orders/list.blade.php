@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Orders</h2>
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
        <th>Invoice No</th>
        <th>User Name</th>
        <th>Amount</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->invoice_no }}</td>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->total_amount }}</td>
        <td>{{ $order->order_status }}</td>
        <td><a href="{{ route('admin.orders.show', $order->id) }}">View</a></td>
    </tr>
    @endforeach
</table>

{!! $orders->links() !!}
@endsection
@section('customJs')


@endsection

