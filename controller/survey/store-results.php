<?php 
    include "../functions.php"; 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $survey_id = $_POST['survey_id'];
        $questions = getQuestiosV2($survey_id);
        $questionsArray = array();
        foreach ($questions as $question) {
            if($question->type == 'radio'){
                $result =   $_POST['question'. $question->id]; 
            } elseif ($question->type == 'checkbox'){
                $result = $_POST['question'. $question->id];
            } else {
                $result =  $_POST['question'. $question->id]; 
            }
            $questionArray = array("id" => $question->id , "survey_id" =>  $survey_id , "results" => $result);
            array_push($questionsArray , $questionArray);
        }
        $final_result = array('survey_id'=> $survey_id , 'questions' => $questionsArray);


        // store in file 
        $results_file = fopen("../../data\\results.txt", "a") or die("Unable to open file!");
        $final_resultJSON = json_encode($final_result);
		fwrite($results_file, $final_resultJSON.'|');

        header('Location: ../../view/index.php');
    }
?>