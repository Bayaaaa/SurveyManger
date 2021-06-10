<?php 
	include "../functions.php";
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id =  $_GET['id'];	

		 // get all surveies
         $myfile = fopen("../../data\\surveies.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../../data\\surveies.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $surveies = array();
         $new_surveies = array();
         foreach($DataArray as $one){
            $survey = json_decode($one);
            if ($survey->id != $id) {
            	array_push($new_surveies, $survey);
            }
         }

        // store new_surveies Array in surveies.txt
		$surveies_file = fopen("../../data\\surveies.txt", "w") or die("Unable to open file!");
		foreach ($new_surveies as $one) {
			$surveyJSON = json_encode($one);
			fwrite($surveies_file, $surveyJSON.'|');
		}


		// delete all questions for this survey
	    deleteQuestionAndAnswer($id , "questions");
	    deleteQuestionAndAnswer($id , "answers");

	    header('Location: ../../view/user-surveies.php');
	}
?>