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
                                        <li>{{$request->customer_name}}
                                        <li>{{$request->customer_id_type}}. {{$request->customer_id}}
                                        <li>Mobile: {{$request->customer_mobile}}
                                        <li>{{$request->customer_email}}
                                        <li style="color:red; font-size: 20px "> <strong>$1000</strong>
                                    </ul>
                                </p>
                                
                            <div style="display: flex;  justify-content: right">
                            {!! Form::open(['route' => 'order.store'], ['class' => 'form']) !!}
                            {!! Form::hidden('customer_name', $request->customer_name)!!}
                            {!! Form::hidden('customer_id_type', $request->customer_id_type)!!}
                            {!! Form::hidden('customer_id', $request->customer_id)!!}
                            {!! Form::hidden('customer_mobile', $request->customer_mobile)!!}
                            {!! Form::hidden('customer_email', $request->customer_email)!!}
                            {!! Form::submit('Confirm!', [ 'class' => 'btn btn-primary', ])!!}
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection