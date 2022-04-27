<?php
  include 'config.php';
    $ids =$_GET['id'];
    $showquery = "DELETE FROM lawyer WHERE Lawyer_id = $ids";
    mysqli_query($con,$showquery);
    session_start();
    session_destroy();
    header("Location: home.php");    
?>