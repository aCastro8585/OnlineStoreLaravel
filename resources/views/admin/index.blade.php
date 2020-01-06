@extends('layouts.app')
@section('content')

<div class="row justify-content-center">

<div class="col-md-10">
<h1>Orders</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($orders as $order)
    <tr>
      <th scope="row">{{ $order->id }}</th>
      <td>{{ $order->customer_name }}</td>
      <td>{{ $order->customer_email }}</td>
      <td>{{ $order->customer_mobile }}</td>
      <td>{{ $order->status }}</td>
    </tr>
    @empty
    <tr>
<p>No registered users</p>
</tr>
@endforelse
  </tbody>
</table>
<div class="row justify-content-center">
<div class="col-md-4">
{!! $orders->links() !!}
</div>
</div>
</div>
</div>
@endsection
