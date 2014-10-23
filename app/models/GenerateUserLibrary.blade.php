<?php

class Library {

	// Properties (Variables)
	private $user; // Array
	private $path; // String

	// Methods (Functions)
	public function setUser($user) {
		$this->user = $user;
	}

	public function getUser() {
		return $this->user;
	}

	public function getUserDetails() {

		// Get the file
    	$user = File::get(app_path().'/database/userlist.json');

    	// Convert to an array
    	$this->user = json_decode($user,true);

    	return $this->user;
	}
}