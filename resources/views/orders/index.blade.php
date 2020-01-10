@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
<div class="col-md-5">

{!! Form::open(['route' => 'order.confirm'], ['class' => 'form']) !!}

<div class="form-group " >

 {!! Form::label('customer_name', 'Name', ['class' => 'control-label'])!!}
{!! Form::text('customer_name', $user->name,
 [
'class' => 'form-control input-lg',
])
 !!}
</div>

<div class="form-group " >
 {!! Form::label('customer_id_type', 'Tipo de identificación', ['class' => 'control-label'])!!}
 {!! Form::select('customer_id_type', ['CC' => 'CC', 'TI' => 'TI'], null,
 [
 'placeholder' => 'Seleccione',
 'class' => 'form-control input-lg'
 ])
 !!}
</div>

<div class="form-group " >
 {!! Form::label('customer_id', 'Número Identificación', ['class' => 'control-label'])!!}
{!! Form::text('customer_id',null ,
 [
'class' => 'form-control input-lg',
 ])
 !!}
</div>

<div class="form-group " >
 {!! Form::label('customer_email', 'Email', ['class' => 'control-label'])!!}
{!! Form::text('customer_email', $user->email,
 [
'class' => 'form-control input-lg',
 ])
 !!}
</div>


<div class="form-group " >
 {!! Form::label('customer_mobile', 'Mobile Phone', ['class' => 'control-label'])!!}
{!! Form::text('customer_mobile', null,
 [
'class' => 'form-control input-lg',
])
 !!}
</div>


 <div class="form-group">
 {!! Form::submit('Order now!',
 [
 'class' => 'btn btn-info btn-lg',
 ])
!!}
</div>

 {!! Form::close() !!}

 </div>

</div>
@endsection