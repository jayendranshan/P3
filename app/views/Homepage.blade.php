<?php
error_reporting(0);
ini_set('display_errors', 1);
?>

@extends('Header')

@section('title')
    Project 3 Home page
@stop

@section('content')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
        <h3><font color="white">Developers Best Friend</font></h3>
	</div>
</div>
<div class="container">
	<div class="jumbotron">
	    <h2>Generate Lorem Ipsum</h2>
	    <p><h4> <small><b>Lorem Ipsum </b> is simply dummy text of the printing and typesetting industry. 
	    	<b>Lorem Ipsum</b> has been the industry's standard dummy text ever since the 1500s, 
	    	when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
	    	It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
	    	It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
	    	and more recently with desktop publishing software like Aldus PageMaker including versions of <b>Lorem Ipsum</b>
	    	</small></h4>
	    	<ul class="nav nav-pills">
	  			<li><a href="/lorem-ipsum"><span class="glyphicon glyphicon-comment"></span> Generate Lorem Ipsum</a></li>
			</ul>
	    </p>
	  </div>
	  <div class="jumbotron">
	    <h2>Generate User</h2>
	    <p><h4> <small>Create random user data for your applications.</small></h4>
	    	<ul class="nav nav-pills">
	  			<li><a href="/user"><span class="glyphicon glyphicon-user"></span> Generate User </a></li>
			</ul>
	    </p>
	  </div>
	  <div class="jumbotron">
	    <h2>Generate XKCD Password</h2>
	    <p><h4> <small>XKCD Password generate technique generates password with common words which are easy to remember with 
	    	but at the same time nearly impposible for attacker to guess the password. 
	    	The most important factor in XKCD password is the length of the password and longer passwords are better 
	    	because each additional character adds much more time to the breaking of the password.
	    	Complexity does not matter unless you have length in passwords. 
	    	Complexity is more difficult for humans to remember, but length is not.</small></h4>
	    	<ul class="nav nav-pills">
	  			<li><a href="/password"><span class="glyphicon glyphicon-lock"></span> Generate Password </a></li>
			</ul>
	    </p>
	  </div>
</div>
@stop