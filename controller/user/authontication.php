<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		// get values from user 
		$email    = $_POST['email'];
		$password = $_POST['password'];
		$hashpass = sha1($password);

		// get all users from file
		 $myfile = fopen("../../data\\users.txt", "r") or die("Unable to open file!");
		 $data =  fread($myfile,filesize("../../data\\users.txt"));

		 $DataArray = explode('|', $data);
		 // remove last item
		 array_pop($DataArray);

		 foreach($DataArray as $one){
		 	$user = json_decode($one);
		 	if ($email == $user->email && $hashpass == $user->password) {
		 		$_SESSION['token'] = $user->token;
		 		$_SESSION['name']  = $user->name;
		 		$_SESSION['id']    = $user->id;
		 		header('Location: ../../view/user-statiscts.php');
		 	}
		 }
		 // redirect to signup page
		 header('Location: ../../view/signup.php');
	}
?>