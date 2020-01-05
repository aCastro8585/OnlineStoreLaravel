@extends('layouts.app')
@section('content')


<div class="row justify-content-center">

<div class="col-md-5">

{!! Form::open(['route' => 'order.confirm'], ['class' => 'form']) !!}

<div class="form-group " >
 {!! Form::label('name', 'Name', ['class' => 'control-label'])!!}
{!! Form::text('name', null,
 [
'class' => 'form-control input-lg',
 'placeholder' => 'PHP Hacking and Pizza'
])
 !!}
</div>

<div class="form-group " >
 {!! Form::label('email', 'Email', ['class' => 'control-label'])!!}
{!! Form::text('email', null,
 [
'class' => 'form-control input-lg',
 'placeholder' => 'PHP Hacking and Pizza'
])
 !!}
</div>


<div class="form-group " >
 {!! Form::label('phone', 'Mobile Phone', ['class' => 'control-label'])!!}
{!! Form::text('phone', null,
 [
'class' => 'form-control input-lg',
 'placeholder' => ''
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