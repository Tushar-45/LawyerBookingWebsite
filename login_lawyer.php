<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>Lawyer | login</title>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #333;
}
* {
    box-sizing: border-box;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
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
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $emailquery = "SELECT * FROM lawyer WHERE email ='$email' AND password ='$password'";
        $query=mysqli_query($con,$emailquery);
        $emailcout = mysqli_num_rows($query);
        if($emailcout>0){
            while($row = mysqli_fetch_assoc($query)){
                session_start();
                $_SESSION["lawyername"] = $row['name'];
                $_SESSION["lawyeremail"] = $row['email'];
                $_SESSION["lawyerphoto"] = $row['photo'];
                $_SESSION["lawyercharge"] = $row['charge'];
                $_SESSION["id"] = $row['Lawyer_id'];
                header("Location: lawyer.php");
            }
        }else{
            ?>
            <script>
                alert("user does not exits or password incorrect");
            </script>
            <?php    
        }
 }
    ?>

<form action="<?php $_SERVER['PHP_SELF'];?>" style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>Log in</h1>
    <p>Please fill in this form to log in.</p>
    <hr>

    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

   
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>



    
    <p> Do not have account <a href="lawyer_reg.php" style="color:dodgerblue">create account</a>.</p>

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit" value="submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
