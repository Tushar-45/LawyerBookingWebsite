
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
            <li><a href="#law-a">Lawyers avaible</a></li>
            <li><a href="mailto: tpanchal219@gmail.com">feedback</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </header>
    <div class="lawyers-con">
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

            </div>
        </div>
        </div>
        <?php
    }
?>

    
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