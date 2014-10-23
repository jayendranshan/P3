<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

@extends('header')

@section('title')
    Project 3 Home page
@stop

@section('content')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
	<div class="navbar-header">
        <font size="5" color="white">Developers Best Friend</font>
	</div>
</div>
</div>
<div class="jumbotron">
  <div class="bs-callout bs-callout-info">
    <h4>Generate Lorem Ipsum</h4>
    <p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry.
    	In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the 
    	graphic elements of a document or visual presentation. 
    	By replacing the distraction of meaningful content with filler text of scrambled Latin it allows 
    	viewers to focus on graphical elements such as font, typography, and layout.
    	<ul class="nav nav-pills">
  			<li><a href="/lorem-ipsum">Click here to generate lorem ipsum</a></li>
		</ul>
    </p>
  </div>
  <div class="bs-callout bs-callout-info">
    <h4>Generate User</h4>
    <p>Create random user data for your applications.
    	<ul class="nav nav-pills">
  			<li><a href="/user">Click here to generate user</a></li>
		</ul>
    </p>
  </div>
</div>
@stop