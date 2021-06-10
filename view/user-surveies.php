<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';

  // start user-statiscts page 
  if (isset($_SESSION['token'])) {
    include "../" . $layouts . 'navbar.php';
    $surveies = getUserSurveies($_SESSION['id']);
   
?>
	<div class="container ">
		<h1>My Surveies</h1>
		<?php if (count($surveies) != 0) { ?>
		<table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Title</th>
		        <th>Type</th>
				<th>Results</th>
		        <th>Control</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php foreach($surveies as $survey) { ?>
		      <tr>
		        <td> <?php echo $survey->title; ?> </td>
				<td> <?php echo $survey->type; ?> </td>
				<td> <?php echo count(getPeople($survey->id)); ?> </td>
		        <td>
		        	<a href="../controller/survey/delete.php?id=<?php echo $survey->id ?>" class="btn btn-danger">Delete</a>
		        	<a href="survey.php?id=<?php echo $survey->id ?>" class="btn btn-success">Show</a>
		        </td>
		      </tr>
		    <?php } ?>
		    </tbody>
		  </table>	
		  <?php } else { ?>
		  	<div class="alert alert-danger text-center">
		  		<h4 class='alternative'>Sorry No Result<h4>
		  	</div>
		  <?php } ?>
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