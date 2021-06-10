<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';
  include "../" . $layouts . 'navbar.php';
  // start user-statiscts page 
  if (isset($_GET['id'])) {
   
    $id       = $_GET['id'];
    $object   = getSurvey($id);
?>
	<div class="container">
		<div class="survey">
			<div class="alert alert-warning text-center title">
				<h3> <?php echo $object['survey']->title; ?> </h3>
			</div>

			<div class="questions">
               <form action="../controller/survey/store-results.php" method="POST">
                    <input type="hidden" 
                           value="<?php echo $object['survey']->id; ?>"
                           name="survey_id">
                    <?php 
                        $counter = 1;
                        foreach ($object['questions'] as $question) { 
                            // start new question
                            echo '<div class="question">';
                                echo '<h4>'.  $counter. ' . ' . $question->name . '</h4>';
                                echo '<div class="list-group">';
                                
                                foreach($object['answers'] as $answre){
                                    if($answre->question_id == $question->id){
                                        if ($question->type == 'radio') { 
                                            echo '<input type="radio" value="' .  $answre->id .'" name="question' . $question->id .'" > '. $answre->name .'</label>';
                                            echo '<br>';
                                        } elseif($question->type == 'checkbox'){
                                            echo '<input type="checkbox" value="' .  $answre->id .'"  name="question'.$question->id.'[]" > '. $answre->name .'</label>';
                                            echo '<br>';
                                        } else {
                                            echo '<input name="question' . $question->id .'" type="text"/>';
                                        } 
                                    }
                                }
                                    echo '</div>';			
                                echo '</div>';
                            echo '<hr>';
                    
                            $counter ++;
                        } 
                    ?>
                    <input type="submit" value="Ok" class="btn btn-primary"> 
			    </form>	
			</div>	
		</div>
	</div>

	<!-- include js files -->
	<script type="text/javascript" src="<?php  echo "../" . $js . 'question.js'; ?>"></script>
<?php
} else {
  header('Location: index.php');
} 
  // include footer
  include "../" . $layouts . 'footer.php';
?>