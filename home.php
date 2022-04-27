<?php
session_start();
    if(isset($_SESSION['username'])){
        header('location: user.php');
    }if(isset($_SESSION['lawyername'])){
        header('location: lawyer.php');
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
    <link rel="stylesheet" href="CSS/imageslideshow.css">
</head>
<body>
    <header>
        <ul>
            <li><a href="home.php" class="active_home">Home</a></li>
            <li><a href="lawyer1.php">Lawyers avaible</a></li>
            <li><a href="mailto: tpanchal219@gmail.com">Contact</a></li>
            <li><a href="about.php">About</a></li>
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

    <div class="section">
    <div class="flex-container">
    <div class="container">
           <h2 id="L" class="btn"><a href="lawyer_reg.php" >Lawyer</a></h2>
           <h2 id="U" class="btn"><a href="reg_user.php" id="U" class="btn">User</a></h2>
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