@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3 " >
            <div class="row no-gutters">
                <div class="col-md-6 " style="padding:10px; display: flex;  align-items: center;  justify-content: center">
                <img src="{{ asset('img/laptop.jpg') }}" class="card-img "  alt="laptop">
                </div>
                    <div class="col-md-6" >
                        <div class="card-body " >
                            <h5 class="card-title " style=" text-align: justify; font-size: 25px;">Confirm Order </h5>
                                <p class="card-text"  > 
                                    <ul style=" text-align: justify; list-style-type: none;">
                                        <li>{{$order->customer_name}}
                                        <li>{{$order->customer_mobile}}
                                        <li>{{$order->customer_email}}
                                        <li style="color:red; font-size: 20px "> <strong>$943.3434</strong>
                                    </ul>
                                </p>
                            <div style="display: flex;  justify-content: right">
                            <a href="#" class="btn btn-primary" >Confirm</a>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection