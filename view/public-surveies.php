<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';
  include "../" . $layouts . 'navbar.php';
  $surveies = getPublicSurveies(); 
?>
<div class="last-surveies">
        <div class="title text-center">
			Public Surveies 
		</div>
    <div class="container">
        <?php foreach($surveies as $survey) { ?>
            <div class="col-md-4">
                <div class="survey text-center">
                    <p class="title-survey">
                        <?php echo $survey->title;  ?>
                    </p>
                    <a href="survey-result.php?id=<?php echo $survey->id; ?>" class="btn btn-primary">Start</a>
                </div>
            </div>
        <?php }  ?>

    </div>
</div>
	<!-- include js files -->
	<script type="text/javascript" src="<?php  echo "../" . $js . 'question.js'; ?>"></script>
<?php
  // include footer
  include "../" . $layouts . 'footer.php';
?>