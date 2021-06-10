<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';
  include "../" . $layouts . 'navbar.php';

  $private_count   = getCountSurveiesByType("private");
  $public_count    = getCountSurveiesByType("public");
  $questions_count = getCountQuestions();
  $users_count     = getCountUsers();

  $public_surveies = getPublicSurveies();
//   echo $lang['welcome'];
?>
	
<div class="cover">
	<div class="cover-in">
		
	</div>
</div>

<!-- start statistic div -->
	<div class="statistics">
		<div class="title text-center title">
			<?php echo $lang['statistic'] ?> 
		</div>
		<div class="container text-center">
			<div class="col-md-3">
				<div class="stat">
					<p class="stat-title"><?php echo $lang['users'] ?> </p>
					<i class="fa fa-users"></i>
					<p class="count"><?php echo $users_count; ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stat">
					<p class="stat-title"><?php echo $lang['private-survies'] ?> </p>
					<i class="fa fa-envelope"></i>
					<p class="count"><?php echo $private_count; ?></p>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stat">
					<p class="stat-title">Public Survies</p>
					<i class="fa fa-envelope-open"></i>
					<p class="count"><?php echo $public_count; ?></p>
			    </div>

			</div>
			<div class="col-md-3">
				<div class="stat">
					<p class="stat-title">Questions</p>
					<i class="fa fa-question-circle"></i>
					<p class="count"><?php echo $questions_count; ?></p>
				</div>
			</div>
		</div>
	</div>
<!-- end statistic div -->

<!-- start slogin div -->
<div class="slogin">
	<div class="slogin-in text-center">
		<p>First and Best Website For Create Awesome Survey</p>
	</div>
</div>
<!-- end slogin div -->

<!-- start last surveies -->
	<div class="last-surveies">
		<div class="title text-center">
			Public Surveies 
		</div>
		<div class="container">
			<?php for ($i=0; $i < 3; $i++) {
				if (isset($public_surveies[$i])) {
			 ?>

				<div class="col-md-4">
					<div class="survey text-center">
						<p class="title-survey">
							<?php echo $public_surveies[$i]->title;  ?>
						</p>
						<a href="survey-result.php?id=<?php echo $public_surveies[$i]->id; ?>" class="btn btn-primary">Start</a>
					</div>
				</div>

			<?php }}  ?>
	
		</div>
	</div>
<!-- end last surveies -->

<?php
  include "../" . $layouts . 'footer.php';
?>