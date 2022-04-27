<?php
session_start();
if(!isset($_SESSION['username'])){
   echo "<script>
        alert('Please Login!')
    </script>";
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer | Home</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/imageslideshow.css">
</head>
<body>
    <header>
        <ul>
            <li><a href="home.php" class="active_home">Home</a></li>
            <li><a href="#law-a">Lawyers avaible</a></li>
            <li><a href="mailto: tpanchal219@gmail.com">Contact</a></li>
            <li><a href="about1.php">About</a></li>
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo $_SESSION['username']?></a></li>
            <a href="logout.php"><button class="btn-logout">logout</button></a>
        </ul>
    </header>
    <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
<div class="numbertext">1 / 3</div>
<img src="https://source.unsplash.com/1200x350/?bussiness,lawyer,court" style="width:100%">
<div class="text">Get the Right Direction
Our experienced lawyers will always guide you to the right direction.</div>
</div>

<div class="mySlides fade">
<div class="numbertext">2 / 3</div>
<img src="https://source.unsplash.com/1200x350/?suit,professional,man" style="width:100%">
<div class="text">Get the Perfect Advice
Our certified lawyers will help you with the best advices.</div>
</div>

<div class="mySlides fade">
<div class="numbertext">3 / 3</div>
<img src="https://source.unsplash.com/1200x350/?law,book,advocate" style="width:100%">
<div class="text">Find the Justice You Deserve
Our kind hearted lawyers will always try their best to bring justice.</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
<div class="lawyers-con" id="law-a">
    <?php
    include 'config.php';
    $selectquery = "SELECT * FROM lawyer";
    $query = mysqli_query($con,$selectquery);
    $nums = mysqli_num_rows($query);
   
    while( $res = mysqli_fetch_array($query)){
      ?>
        <div class="lawyer">
        <div class="lawyer-container">
            <div class="image">
                
                <img src ="<?php echo $res['photo']  ?>">
               
            </div>
            <hr>
            <div class="content">
                <div class="name"><?php echo $res['name']?></div>
                <div class="phone"><?php echo $res['phone']?></div>
                <div class = "email"><?php echo $res['email']?></div>
                <span class ="time">&#x20B9;<?php echo $res['charge']?></span>
                <a href="mailto: <?php echo $res['email']?>"><button type="submit" class="signupbtn" name="submit" value="submit">Appointment</button></a>
            </div>
        </div>
        </div>
        <?php
    }
?> 
 </div>
 <footer>
        <h3>Made by Tushar Panchal & Umang </h3><br>
        <h3>&copy 2021-2022</h3>
    </footer>
 <script src="JS/imageslideshow.js"></script>

</body>
</html>