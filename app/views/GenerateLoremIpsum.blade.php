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
	        <font size="6" color="white">Lorem Ipsum</font>
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
	{{ Form::open(array('url' => 'lorem-ipsum','method' => 'POST')) }}

		{{ Form::label('number_of_paragraph', 'Choose No. of Paragraphs: ',array('class' => 'label label-default')) }}
		&nbsp;&nbsp;&nbsp;
		{{ Form::label('MaxValue', 'Max: 10 ',array('class' => 'label label-info')) }}
		&nbsp;&nbsp;&nbsp;
		{{ Form::text('number_of_paragraph', Input::get("number_of_paragraph"),array('class' => 'input-group-sm ','id' => 'number_of_paragraph')) }}
		&nbsp;<span>{{$ValidationMessage}}</span><br><br>
		{{ Form::submit('Generate Lorem Ipsum',array('class' => 'btn btn-primary'))}}
		<br><br>
	{{ Form::close() }}
</div>

	
	@foreach($ParagraphText as $title)
		<div class="well">
		<p>
			{{{$title}}}
		</P>
	</div>
	@endforeach
</div>

@stop