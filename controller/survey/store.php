<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// get values from user 
		$title = $_POST['title'];
		$count = $_POST['count'];
		$type  = $_POST['type'];
		$answers_count = $_POST['answers_count'];

		// init Files
		$surveies_file = fopen("../../data\\surveies.txt", "a") or die("Unable to open file!");
		$questions_file = fopen("../../data\\questions.txt", "a") or die("Unable to open file!");
		$answers_file = fopen("../../data\\answers.txt", "a") or die("Unable to open file!");

		// store Survey in file
		$id         = rand(1,10000);
		$user_id    = $_SESSION['id'];
		$survey     = array("id" => $id , "title" => $title , "user_id" => $user_id , "type" => $type);
		$surveyJSON = json_encode($survey);
		fwrite($surveies_file, $surveyJSON.'|');


		// init Questions File 
		

		for ($i=1; $i <= $count ; $i++) {
			// store question in file
			$question_id = rand(1,10000);
			$question = array("id" => $question_id ,"name" => $_POST['question'.$i] , "survey_id" => $id , "type" => $_POST['type'.$i]);
			$myJSON = json_encode($question);
			fwrite($questions_file, $myJSON.'|');

			// store answers
			for ($j=1; $j <= $answers_count ; $j++) { 
				if (isset($_POST['answer'.$j.'q'.$i])) {
					$answer_id = rand(1,10000);
					$answer    = array("id" => $answer_id ,"name" => $_POST['answer'.$j.'q'.$i] , "question_id" => $question_id , "survey_id" => $id);
					$answerJSON = json_encode($answer);
					fwrite($answers_file, $answerJSON.'|');
				}
			}
		}

	// redirect to add-survey page 
	header('Location: ../../view/add-survey.php');
	}
?>