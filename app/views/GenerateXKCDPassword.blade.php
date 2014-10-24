<?php
error_reporting(0);
ini_set('display_errors', 1);
?>

@extends('Header')

@section('title')
    Generate XKCD Password
@stop

@section('content')
<!-- header-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
	        <font size="6" color="white">XKCD Password generator</font>
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
	<form method="POST" action="password">
			<div>
				<label class="label label-default">Total No. of words: </label>&nbsp;&nbsp;&nbsp;
				<input type='text'  name='number_of_words' id='number_of_words' value=
<?php echo (isset($_POST['number_of_words'])) ? $_POST[number_of_words] : '' ?>> 
				&nbsp;<span>{{{$ValidationMessage}}}</span>
				<br><br>
				<label class="label label-default"> Include a number: </label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="group1" value="Yes"> Yes
				<input type="radio" name="group1" value="No" checked> No
				<br><br>
				<label class="label label-default"> Include a special character: </label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="group2" value="Yes"> Yes
				<input type="radio" name="group2" value="No" checked> No
				<br><br>
				<label class="label label-default"> Include a word separator: </label>&nbsp;&nbsp;&nbsp;
				<input type="radio" name="group4" value="Space"> Space
				<input type="radio" name="group4" value="Hyphen"> Hyphen
				<br><br>
				<input type="submit" value="Generate the password" class="btn btn-primary">
				<br><br>
			</div>
		</form>

		<div class="well">
		<p>
			<label>Generated Password:</label> &nbsp; &nbsp; &nbsp;<p class="PwdFont">{{{$Password}}} </p>
		</P>
	</div>

	<div id="well">
		<br>
		<p><b><u>Password was generated using xkcd model and please see below for more information on xkcd model.</u></b></p>
		<br>
		<a href='http://xkcd.com/936/'>
				<img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>
			</a>
		</div>	
	</div>
</div>