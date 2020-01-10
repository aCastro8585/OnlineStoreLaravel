@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card text-center">
    <div class="card-header">
        Estado de la transacción
    </div>
    <div class="card-body">
        <h5 class="card-title">Estado: {{$response['payment'][0]['status']['message']}} </h5>
        <p class="card-text">{{$response['status']['message']}}</p>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Document:
            </div>
            <div class="col-md-4">
            {{$response['request']['payer']['documentType']}}: {{$response['request']['payer']['document']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Name:
            </div>
            <div class="col-md-4">
            {{$response['request']['payer']['name']}} {{$response['request']['payer']['surname']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Email:
            </div>
            <div class="col-md-4">
            {{$response['request']['payer']['email']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Mobile:
            </div>
            <div class="col-md-4">
            {{$response['request']['payer']['mobile']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Description:
            </div>
            <div class="col-md-4">
            {{$response['request']['payment']['description']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Total:
            </div>
            <div class="col-md-4">
            {{$response['request']['payment']['amount']['currency']}} {{$response['request']['payment']['amount']['total']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Bank:
            </div>
            <div class="col-md-4">
            {{"Uknown"}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Payment Method:
            </div>
            <div class="col-md-4">
            {{$response['payment'][0]['paymentMethodName']}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
            Date:
            </div>
            <div class="col-md-4">
            {{$response['payment'][0]['status']['date']}}
            </div>
        </div>
        </br>
        @if ($response['status']['status']== 'APPROVED')
        <a href="{{ route('order.index') }}"  class="btn btn-primary">Buy Again!</a>
        @elseif ($response['status']['status']== 'PENDING')
        <a href=" {{$response['request']['fields'][0]['value']}}" class="btn btn-primary"> Complete Payment!</a>
        @elseif ($response['status']['status']== 'REJECTED')
        <a href="{{ route('order.index') }}" class="btn btn-primary">Try Again! </a>
        @endif
    </div>
    <div class="card-footer text-muted">
        Online Store
    </div>
    </div>
  </div>
</div>
@endsection