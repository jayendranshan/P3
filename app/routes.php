<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('Homepage');
});

Route::get('/lorem-ipsum', function()
{
	return View::make('GenerateLoremIpsum');
});

Route::post('/lorem-ipsum', function()
{
	$ValidateNoofWords="";
	$NoOfParagraph = "";
	$NoOfParagraph = Input::get('number_of_paragraph');

	$generator = new Badcow\LoremIpsum\Generator();

	//Validating the input. Restricting input to 1 to 10.
	if($NoOfParagraph < 1 || $NoOfParagraph > 10)
	{
		$ValidateNoofWords = "Please enter value from 1 to 10";
		$paragraphs = $generator->getParagraphs(0);
	}
	else
	{
		$paragraphs = $generator->getParagraphs($NoOfParagraph);
		$ValidateNoofWords = "";
	}
	return View::make('GenerateLoremIpsum') -> with('ParagraphText', $paragraphs)
											-> with('ValidationMessage',$ValidateNoofWords);
});


Route::get('/user', function()
{
	return View::make('GenerateUser');
});


Route::post('/user', function()
{
	$UserCount="";
	$BirthDate = "";
	$Phone = "";
	$Email = "";
	$Address = "";
	$ValidateNoofWords="";

	$UserCount = Input::get('UserCount');
	$BirthDate = Input::get('BirthDate');
	$Email = Input::get('Email');
	$Phone = Input::get('PhoneNo');
	$Address = Input::get('Address');
	//require_once base_path().'/vendor/fzaninotto/Faker/src/autoload.php';

	$faker = Faker\Factory::create();
	if($UserCount < 1 || $UserCount > 10)
		{
			$ValidateNoofWords = "Please enter value from 1 to 10";
			$User = $faker->sentence(0);
		}
	else
		{
			for($i=0;$i<$UserCount;$i++)
				{	
					$User[$i]['UserName'] = $faker->name;

					if($BirthDate == true)
					{
						$User[$i]['Birthday'] = $faker->monthName($max = 'now').' '.$faker->dayOfMonth($max = 'now').','.$faker->year($max = 'now');
					}
					if($Phone == true)
					{
						$User[$i]['Phone'] = $faker->phoneNumber;
					}
					if($Email == true)
					{
						$User[$i]['Email'] = $faker->email;
					}
					if($Address == true)
					{
						$User[$i]['Address'] = $faker->address;
					}
				}
		}
	return View::make('GenerateUser')-> with('UserData', $User)
									-> with('ValidationMessage',$ValidateNoofWords);
});