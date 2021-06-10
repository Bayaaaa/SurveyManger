<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';

  // start user-statiscts page 
  if (isset($_SESSION['token'])) {
    include "../" . $layouts . 'navbar.php';
   
?>
	<div class="container">
		<h1 class="text-center">Create New Survey</h1>
		<!-- start create survey -->
		<form class="form-horizontal" 
			  method="POST" 
			  action="../controller/survey/store.php">

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="title">Title:</label>
		    <div class="col-sm-10">
		      <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="type">Type:</label>
		    <div class="col-sm-10">
		      <select class="form-control" name="type"> 
		      	<option value="private">Private</option>
		      	<option value="public">Public</option>
		      </select>
		    </div>
		  </div>

		<!-- Start Count questions -->
		<div class="form-group">
		    <label class="control-label col-sm-2" for="title">Count:</label>
		    <div class="col-sm-10">
		    	<input type="hidden" id="count" name="count">
		    	<input type="hidden" id="answers-count" name="answers_count">
		        <p class="form-control-static count">0</p>
		    </div>
		</div>

		<!-- Questions Area -->
		<div class="questions">
			
		</div>


		<!-- Add Question Btn -->
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
		    <div class="col-sm-10">
		      <button onclick="addQuestion(),event.preventDefault();" class="add-question btn btn-success">Add Question</button>
		    </div>
		</div>



		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
		</div>
		</form>		
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