<?php 
	/*
		Function randoomString v1.0
		input: length:integer
		output: string
	*/
    function randoomString($length) {
        $result = '';
        for($i = 0; $i < $length; $i++) {
            $result .= chr(rand(0, 25) + 97);
        }
        return $result;
    }

    /*
        Function getUserSurveies v1.0
        input: id:integer
        output: array of user object
    */
    function getUserSurveies($id){
        // get all surveies from file
         $myfile = fopen("../data\\surveies.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\surveies.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $surveies = array();
         foreach($DataArray as $one){
            $survey = json_decode($one);
            if ($survey->user_id == $id) {
                array_push($surveies, $survey);
            }
         }
         fclose($myfile);

         return $surveies;
    }


    /*
        Function getCountSurveiesByType v1.0
        input: type:string
        output: count of surveies by type
    */
    function getCountSurveiesByType($type){
        // get all surveies from file
         $myfile = fopen("../data\\surveies.txt", "r") or die("Unable to open file!");
         $data   = fread($myfile,filesize("../data\\surveies.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $surveies = array();
         foreach($DataArray as $one){
            $survey = json_decode($one);
            if ($survey->type == $type) {
                array_push($surveies, $survey);
            }
         }

         return count($surveies);
    }

    /*
        Function getCountQuestions v1.0
        input: 
        output: count of all questions in sysytem
    */
    function getCountQuestions(){
        // get all questions from file
         $myfile = fopen("../data\\questions.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\questions.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         return count($DataArray);
    }

    /*
        Function getCountUsers v1.0
        input: 
        output: count of all users in sysytem
    */
    function getCountUsers(){
         // get all questions from file
         $myfile = fopen("../data\\users.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\users.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         return count($DataArray);
    }

    /*
        Function getSurveiesCountByType v1.0
        input: id:integer , type:string
        output: count of surveies 
    */
    function getSurveiesCountByType($id , $type){
        // get all users from file
         $myfile = fopen("../data\\surveies.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\surveies.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $surveies = array();
         foreach($DataArray as $one){
            $survey = json_decode($one);
            if ($survey->user_id == $id && $survey->type == $type) {
                array_push($surveies, $survey);
            }
         }

         return count($surveies);
    }

    /*
        Function deleteQuestionAndAnswer v1.0
        input: survey_id:integer , type:string
        output: delete all records from spesific file
    */
    function deleteQuestionAndAnswer($survey_id , $type){
        // get all questions from file
         $myfile = fopen("../../data\\". $type .".txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../../data\\". $type .".txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $objects = array();
         $new_objects = array();
         foreach($objects as $one){
            $object = json_decode($one);
            if ($object->survey_id != $survey_id) {
                array_push($new_objects, $object);
            }
         }

        // store new_questions Array in surveies.txt
        $objects_file = fopen("../../data\\". $type .".txt", "w") or die("Unable to open file!");
        foreach ($new_objects as $one) {
            $objectJSON = json_encode($one);
            fwrite($objects_file, $objectJSON.'|');
        }

    }

    /*
        Function getPublicSurveies v1.0
        input: -----
        output: return all public surveies
    */
    function getPublicSurveies(){
       // get all surveies from file
         $myfile = fopen("../data\\surveies.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\surveies.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $surveies = array();
         foreach($DataArray as $one){
            $survey = json_decode($one);
            if ($survey->type == "public") {
                array_push($surveies, $survey);
            }
         }

         return $surveies;  
    }

    /*
        Function getSurvey v1.0
        input: id:integer
        output: survey by id with questions and answers
    */
    function getSurvey($id){
         // get  survey from file
         $myfile = fopen("../data\\surveies.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\surveies.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $result = [];
         foreach($DataArray as $one){
            $survey = json_decode($one);
            if ($survey->id == $id) {
                $result['survey'] = $survey;
            }
         }

         // get all questions 
         $result['questions'] = getQuestios($id);
         $result['answers']   = getAnswers($id);
         return $result; 
    }

    /*
        Function getQuestios v1.0
        input: id:survey_id
        output: questions by survey_id 
    */
    function getQuestios($survey_id){
         // get  survey from file
         $myfile = fopen("../data\\questions.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\questions.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $result = [];
         foreach($DataArray as $one){
            $question = json_decode($one);
            if ($question->survey_id == $survey_id) {
                array_push($result, $question);
            }
         }

         return $result;    
    }

    function getQuestiosV2($survey_id){
        // get  survey from file
        $myfile = fopen("../../data\\questions.txt", "r") or die("Unable to open file!");
        $data =  fread($myfile,filesize("../../data\\questions.txt"));

        $DataArray = explode('|', $data);
        // remove last item
        array_pop($DataArray);

        $result = [];
        foreach($DataArray as $one){
           $question = json_decode($one);
           if ($question->survey_id == $survey_id) {
               array_push($result, $question);
           }
        }

        return $result;    
   }

    /*
        Function getCountResult v1.0
        input: id:survey_id
        output: Count Number of people who participated in survey

    */
   function getPeople($survey_id){
        // get  survey from file
        $myfile = fopen("../data\\results.txt", "r") or die("Unable to open file!");
        $data =  fread($myfile,filesize("../data\\results.txt"));

        $DataArray = explode('|', $data);
        // remove last item
        array_pop($DataArray);

        $results = [];
        foreach($DataArray as $one){
            $result = json_decode($one);
            if ($result->survey_id == $survey_id) {
                array_push($results, $result);
            }
        }

        return $results;  
   }

    /*
        Function getCountChoice v1.0
        input: id:asnwer_id
        output: 
    */
    function getCountChoice($asnwer_id){
        // get  survey from file
        $myfile = fopen("../data\\results.txt", "r") or die("Unable to open file!");
        $data =  fread($myfile,filesize("../data\\results.txt"));

        $DataArray = explode('|', $data);
        // remove last item
        array_pop($DataArray);

        $count  = 0;
        foreach($DataArray as $one){
            $result = json_decode($one);
            foreach($result->questions as $question){
                if(is_array($question->results)){
                    if(in_array($asnwer_id,$question->results)){
                        $count ++;
                    }
                } else {
                    if($question->results == $asnwer_id){
                        $count ++;
                    }
                }
            }
        }
        return $count;
    }

    function getTextAnswers($question_id){
        // get  survey from file
        $myfile = fopen("../data\\results.txt", "r") or die("Unable to open file!");
        $data =  fread($myfile,filesize("../data\\results.txt"));

        $DataArray = explode('|', $data);
        // remove last item
        array_pop($DataArray);

        $texts  = [];
        foreach($DataArray as $one){
            $result = json_decode($one);
            foreach($result->questions as $question){
                if($question->id == $question_id){
                    array_push($texts , $question->results);
                }
            }
        }
        
        return $texts;
    }
  
    /*
        Function getAnswers v1.0
        input: id:survey_id
        output: answers by survey_id 
    */
    function getAnswers($survey_id){
         // get  survey from file
         $myfile = fopen("../data\\answers.txt", "r") or die("Unable to open file!");
         $data =  fread($myfile,filesize("../data\\answers.txt"));

         $DataArray = explode('|', $data);
         // remove last item
         array_pop($DataArray);

         $result = [];
         foreach($DataArray as $one){
            $answer = json_decode($one);
            if ($answer->survey_id == $survey_id) {
                array_push($result, $answer);
            }
         }

         return $result; 
    }
?>