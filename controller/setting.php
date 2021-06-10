<?php 
    session_start();
    // start set language
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $lang = $_POST['language'];
        $_SESSION['lang'] =  $lang;
        header('Location: ../view/index.php');
    }
?>