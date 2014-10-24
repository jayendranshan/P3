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

//Route to home page
Route::get('/', function()
{
	return View::make('Homepage');
});

//Route to Generate lerem ipsum home page
Route::get('/lorem-ipsum', function()
{
	return View::make('GenerateLoremIpsum');
});

//This route has logic to generate lorem ipsum. 
Route::post('/lorem-ipsum', function()
{
	$ValidateNoofParagraph="";
	$NoOfParagraph = "";
	$NoOfParagraph = Input::get('number_of_paragraph');

	$generator = new Badcow\LoremIpsum\Generator();

	//Validating the input. Restricting input to 1 to 10.
	if($NoOfParagraph < 1 || $NoOfParagraph > 10)
	{
		$ValidateNoofParagraph = "Please enter value from 1 to 10";
		$paragraphs = $generator->getParagraphs(0);
	}
	else
	{
		//Generating paragraph using Badcow package
		$paragraphs = $generator->getParagraphs($NoOfParagraph);
		$ValidateNoofParagraph = "";
	}
	//returning the view with paragraphs
	return View::make('GenerateLoremIpsum') -> with('ParagraphText', $paragraphs)
											-> with('ValidationMessage',$ValidateNoofParagraph);
});

//Route to Generate user details
Route::get('/user', function()
{
	return View::make('GenerateUser');
});

// This route has logic to generate user details
Route::post('/user', function()
{
	$UserCount="";
	$BirthDate = "";
	$Phone = "";
	$Email = "";
	$Address = "";
	$ValidateNoofUser="";

	$UserCount = Input::get('UserCount');
	$BirthDate = Input::get('BirthDate');
	$Email = Input::get('Email');
	$Phone = Input::get('PhoneNo');
	$Address = Input::get('Address');
	//require_once base_path().'/vendor/fzaninotto/Faker/src/autoload.php';

	//initializing faker package
	$faker = Faker\Factory::create();
	if($UserCount < 1 || $UserCount > 10)
		{
			$ValidateNoofUser = "Please enter value from 1 to 10";
			//generating empty profile if the no of user value is greater than 10 and less than 1.
			$User = $faker->sentence(0);
		}
	else
		{
			//generating user details.
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
									-> with('ValidationMessage',$ValidateNoofUser);
});

//route to generate XKCD password
Route::get('/password', function()
{
	return View::make('GenerateXKCDPassword');
});

Route::post('/password', function()
{
	$WordCount="";
	$IncludeNumber = "";
	$IncludeCharacter = "";
	$Seperator = "";
	$ValidateNoofWords="";
	$Word="";
	$SelectedWords = array();
	$SpecialCharacters = array('!','@','#','$','%','*');
	$SelectedFinalWords="";
	$randomSpecialCharacter = 1;
	$IncludeNumberInput = "";
	$IncludeCharacterInput = "";

	$WordCount = Input::get('number_of_words');
	$IncludeNumberInput = Input::get('group1');
	$IncludeCharacterInput = Input::get('group2');
	$Seperator = Input::get('group4');

	//checking if the password should contain number
	if($IncludeNumberInput == 'Yes')
	{
		$IncludeNumber = true;
	}
	//checking if th password should have special character
	if($IncludeCharacterInput == "Yes")
	{
		$IncludeCharacter = true;
	}

	//initiaizing faker package
	$faker = Faker\Factory::create();

	
	if($WordCount < 1 || $WordCount > 10)
	{
		$ValidateNoofWords = "Please enter value from 1 to 10";
		//generating empty password if the no of words are more than 10 and less than 1.
		$Words = $faker->words($nb = 0);
	}
	else
	{
		//generating password based on the input
		for($i=0;$i<$WordCount;$i++)
		{
			$Word = $faker->word;
			if($Seperator == "Space")
			{
				array_push($SelectedWords, $Word);
				$SelectedFinalWords = implode(" ", $SelectedWords);
			}
			else if($Seperator == "Hyphen")
			{
				array_push($SelectedWords, trim($Word));

				$SelectedFinalWords = implode("-", $SelectedWords);
			}
			else
			{
				array_push($SelectedWords, trim($Word));

				$SelectedFinalWords = implode("", $SelectedWords);
			}
		}

		//Adding a number if number is needed
		if($IncludeNumber)
		{
			$SelectedFinalWords = $SelectedFinalWords . rand(0,9);
		}

		//Adding special character if it is needed.
		if($IncludeCharacter)
		{
			$randomSpecialCharacter = rand(0,5);
			$SelectedFinalWords = $SelectedFinalWords . $SpecialCharacters[$randomSpecialCharacter];
		}
	}

	return View::make('GenerateXKCDPassword')-> with('Password', $SelectedFinalWords)
									-> with('ValidationMessage',$ValidateNoofWords);
});