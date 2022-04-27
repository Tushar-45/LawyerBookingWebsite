<?php
 $con = mysqli_connect('localhost','root','','lawyer');
 if($con){

 }else{
    ?>
    <script>
    alert("not Connect to DB");
    </script>
    <?php
 }
?>