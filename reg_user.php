
<!DOCTYPE html>
<html>
<title>user | register </title>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #333;
}
* {
    box-sizing: border-box;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=tel] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=tel]:focus, input[type=password]:focus, input[type=tel]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  background-color: #fff;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
    <?php
    @include 'config.php';
     if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $num = $_POST['number'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        $emailquery = "SELECT * FROM user WHERE email ='$email'";
        $query=mysqli_query($con,$emailquery);
        $emailcout = mysqli_num_rows($query);
        if($emailcout>0){
            ?>
            <script>
                alert("Email Already exits!");
            </script>
            <?php
        }else{
            if($password === $cpassword){
                $insquery = "INSERT INTO user(name, phone, email, password) VALUES ('$name','$num','$email','$password')";
                $iquery= mysqli_query($con,$insquery);
                header("Location: user_log.php");
            }else{
                ?>
            <script>
                alert("password not match");
            </script>
            <?php 
            }
        }
        
     }
    ?>

<form action="<?php $_SERVER['PHP_SELF'];?>" style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>Sign Up for user</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="phone"><b>Phone No</b></label>
    <input type="tel" placeholder="Enter number" name="number" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpass" required>

    
    <p> Have an account? <a href="user_log.php" style="color:dodgerblue">login</a>.</p>

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit" value="submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
