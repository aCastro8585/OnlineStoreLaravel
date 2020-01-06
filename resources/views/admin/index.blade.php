@extends('layouts.app')
@section('content')


<h1>Orders</h1>

<ul>
@forelse ($orders as $order)

<li>{{ $order->customer_name }} ({{ $order->customer_email }})</li>

@empty

<li>No registered users</li>

@endforelse
</ul>


@endsection