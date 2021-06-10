<?php
  session_start();
  include "../init.php";
  include "../" . $layouts . 'header.php';

  // start user-statiscts page 
  if (isset($_SESSION['token'])) {
    include "../" . $layouts . 'navbar.php';
?>

  <div class="container  home-stats">
    <h1> My Statistics </h1>
    <div class="row">
       <div class="col-md-4">
           <div class="stat st-all">
           <i class="fa fa-files-o"></i>
               <div class="info">
                    All Surveies
                   <span><a href="#">
                      <?php echo count(getUserSurveies($_SESSION['id'])); ?>
                    </a></span>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="stat st-public">
           <i class="fa fa-users"></i>
               <div class="info">
                  Public
               <span><a href="#">
                   <?php echo getSurveiesCountByType($_SESSION['id'] , "public"); ?>
               </a></span>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="stat st-private">
           <i class="fa fa-user"></i>
               <div class="info">
                  Private  
                <span><a href="#">
                    <?php echo getSurveiesCountByType($_SESSION['id'] , "private"); ?>  
                </a></span>
               </div>
           </div>
       </div>
    </div> <!-- end div row -->

  </div>

<?php
} else {
  header('Location: index.php');
} 
  // include footer
  include "../" . $layouts . 'footer.php';
?>