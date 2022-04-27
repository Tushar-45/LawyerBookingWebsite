<?php
session_start();
if(!isset($_SESSION["lawyername"])){
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/home.css">
</head>
<body>
    <header> 
        <ul>
            <li><a href="home.php" class="active_home">Home</a></li>
            <li><a href="mailto: tpanchal219@gmail.com">Want to change details?</a></li>
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo $_SESSION['lawyername']?></a></li>
            <a href="logout.php"><button class="btn-logout">logout</button></a>
        </ul>
    </header>
    <div class="lawyers-con">
    <?php
    include 'config.php';
    ?>
        <!-- <div class="lawyer">
        <div class="lawyer-container">
            <div class="image">
                
                <img src =<?php echo $_SESSION["lawyerphoto"]?>>
               
            </div>
            <hr>
            <div class="content">
                <div class="name"><?php echo $_SESSION['lawyername']?></div>
                <div class="phone"><?php echo $_SESSION["lawyerphone"]?></div>
                <div class = "email"><?php echo $_SESSION["lawyeremail"]?></div>
                <span class ="time">&#x20B9;<?php echo $_SESSION["lawyercharge"]?></span>

            </div>
        </div>
        </div> -->


    
    </div>
    
    <div class="section">
    <div class="flex-container">
        <div class="lawyername" style="font-size: 75px;">Hii, <span style="font-size: 75px; color: crimson;" style=""><?php echo $_SESSION['lawyername']?><span></div>
        <div class="lawyeremail" style="font-size: 65px;"><?php echo $_SESSION["lawyeremail"]?></div>
        <div class="container">
           <h2 id="L" class="btn"><a href="lawyerupdate.php?id=<?php echo $_SESSION['id']?>"&body=<?php echo $_SESSION['lawyername']; echo $_SESSION["lawyeremail"];?>>update details</a></h2>
           <h2 id="U" class="btn"><a href="lawyerdelete.php?id=<?php echo $_SESSION['id']?>"&body=<?php echo $_SESSION['lawyername'];echo $_SESSION["lawyeremail"];?>>delete details</a></h2>
    </div>
    </div>
    </div>
    <script src="JS/imageslideshow.js"></script>
    <footer>
        <h3>Made by Tushar Panchal & Umang </h3><br>
        <h3>&copy 2021-2022</h3>
    </footer>
</body>
</html>