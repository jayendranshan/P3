<?php
error_reporting(0);
ini_set('display_errors', 1);
?>

@extends('Header')

@section('title')
    Generate Lorem Ipsum
@stop

@section('content')

<?php
	//require app_path().'/models/LoremIpsumLogic.blade.php'; 
	$Paras = "";
	$ValidateNoofWords="";
	
?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
	        <font size="5" color="white">Lorem Ipsum</font>
	        <a href="/"> Back to Home Page </a>
		</div>
	</div>
</div>
<br><br><br>
<div class="container">
	{{ Form::open(array('url' => 'lorem-ipsum','method' => 'POST')) }}

		{{ Form::label('number_of_paragraph', 'Choose No. of Paragraphs: ',array('class' => 'label label-default')) }}
		{{ Form::label('MaxValue', 'Max: 10 ',array('class' => 'label label-info')) }}
		{{ Form::text('number_of_paragraph', Input::get("number_of_paragraph"),array('class' => 'input-group-sm ','id' => 'form-control input-sm')) }}
		&nbsp;<span>{{$ValidationMessage}}</span><br><br>
		{{ Form::submit('Generate Lorem Ipsum',array('class' => 'btn btn-primary'))}}
		<br><br>
	{{ Form::close() }}

	
	@foreach($ParagraphText as $title)
		<div class="well">
		<p>
			{{$title}}
		</P>
	</div>
	@endforeach
</div>

@stop