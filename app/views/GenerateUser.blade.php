<?php
error_reporting(0);
ini_set('display_errors', 1);
?>

@extends('Header')

@section('title')
    Generate User
@stop

@section('content')	

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
	        <font size="5" color="white">Generate User Data</font>	
		</div>

	<div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/"> <span class="glyphicon glyphicon-home"></span> Go to Home Page </a></li>
          </ul>
        </div>
		
	</div>
</div>
<br><br><br>
<div class="container">
	<div class="well well-sm">
		{{ Form::open(array('url' => 'user','method' => 'POST')) }}

		{{ Form::label('number_of_user', 'How many user needed: ',array('class' => 'label label-default')) }}
		&nbsp;&nbsp;&nbsp;
		{{ Form::label('MaxValue', 'Max: 10 ',array('class' => 'label label-info')) }}&nbsp;&nbsp;&nbsp;
		{{ Form::text('UserCount', Input::get("UserCount"),array('class' => 'input-group-sm ','id' => 'form-
		control input-sm')) }}&nbsp;<span>{{$ValidationMessage}}</span><br><br>

		{{ Form::label('PersonalInfo', 'Include the following info: ',array('class' => 'label label-default')) }}&nbsp;&nbsp;&nbsp;
		{{ Form::checkbox('BirthDate', '1', true) }}BirthDate &nbsp;&nbsp;
		{{ Form::checkbox('Email', '1', true) }}Email &nbsp;&nbsp;
		{{ Form::checkbox('PhoneNo', '1', true) }}PhoneNo &nbsp;&nbsp;
		{{ Form::checkbox('Address', '1', true) }}Address
			<br><br>
		{{ Form::submit('Generate User',array('class' => 'btn btn-primary'))}}
		<br><br>

	{{ Form::close() }}
</div>
	@foreach($UserData as $User)
		<div class="well">
		<p>
			<b>UserName:</b> {{{ $User['UserName'] }}} 
		</P>
		@if(isset($User['Birthday']))
		<p>
			<b>BirthDate:</b> {{{ $User['Birthday'] }}} 
		</P>
		@endif

		@if (isset($User['Email']))
		<p>
			<b>Email:</b> {{{ $User['Email'] }}} 
		</P>
		@endif

		@if (isset($User['Phone']))
		<p>
			<b>PhoneNumber:</b> {{{ $User['Phone'] }}} 
		</P>
		@endif
		
		@if (isset($User['Address']))
		<p>
			<b>Address:</b> {{{ $User['Address'] }}} 
		</P>
		@endif

	</div>
	@endforeach

</div>
@stop