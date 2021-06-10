<?php 
	// include functions 
	include "../functions.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		// get values from user 
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$password = $_POST['password'];
		$hashpass = sha1($password);

		// echo $name . '  '. $email . '  '. $password;

		// init Files
		$users_file = fopen("../../data\\users.txt", "a") or die("Unable to open file!");

		// store User in file
		$id    = rand(1,10000);
		$token = randoomString(20);
		$user  = array("id" => $id , "name" => $name , "email" => $email , "password" => $hashpass , "token" => $token);
		$userJSON = json_encode($user);
		fwrite($users_file, $userJSON.'|');

		// redirect to signup.php 
		header('Location: ../../view/signup.php');
	}
?>