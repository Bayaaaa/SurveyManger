<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';

  // start user-statiscts page 
  if (isset($_SESSION['token'])) {
    include "../" . $layouts . 'navbar.php';
    $id       = $_GET['id'];
	$object   = getSurvey($id);
	$count_people   = count(getPeople($id));
?>
	<div class="container">
		<div class="survey">
			<div class="alert alert-warning text-center title">
				<h3> <?php echo $object['survey']->title; ?> </h3>
			</div>
			<div class="control">
				<?php if( $object['survey']->type == 'public'){ ?>
					<input type="button" class="btn btn-primary" value="Copy Url" onclick="Copy();" />
					<input class="form-control" id="url" value="http://localhost/survey/view/survey-result.php?id=<?php echo $id; ?>">
				<?php } ?>		
					<input type="button" class="btn btn-warning" value="Print Survey" onclick="" />	
			</div>
			<br>

			<div class="questions">
				<?php foreach ($object['questions'] as $question) { 
						echo '<div class="question">';
							echo '<h4>'. $question->name . '</h4>';
							echo '<div class="list-group">';
							foreach($object['answers'] as $answre){
								if ($answre->question_id == $question->id) { 
									if($question->type == 'text'){
										$answers = getTextAnswers($question->id);
										foreach ($answers as $answer) {
											echo '<a href="#" class="list-group-item">'. $answer .'</a>';
										}
									} else {
										$percent = getCountChoice($answre->id)/$count_people*100;
										echo '<a href="#" class="list-group-item">' . $answre->name . ' |  ' . $percent . ' %</a>';
									}
								}
							}
							echo '</div>';			
						echo '</div>';
					echo '<hr>';	
			 	} ?> 
				
			</div>	
		</div>
	</div>
	<script>
		function Copy(){
			var Url = document.getElementById("url");
			Url.innerHTML = window.location.href;
			Url.select();
			document.execCommand("copy");
		}
	</script>
	<!-- include js files -->
	<script type="text/javascript" src="<?php  echo "../" . $js . 'question.js'; ?>"></script>
<?php
} else {
  header('Location: index.php');
} 
  // include footer
  include "../" . $layouts . 'footer.php';
?>