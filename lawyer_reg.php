
<!DOCTYPE html>
<html>
  <title>Lawyer | Register</title>
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
        $charge = $_POST['charge'];
        $cpassword = $_POST['cpass'];
        $photo = $_FILES['photo']['name'];
        $tmpphoto =$_FILES['photo']['tmp_name'];
        
        $emailquery = "SELECT * FROM lawyer WHERE email ='$email'";
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
                $insquery = "INSERT INTO lawyer(name, phone, email, password,photo,charge) VALUES ('$name','$num','$email','$password','$photo','$charge')";
                $iquery= mysqli_query($con,$insquery);
                if(move_uploaded_file($tmpphoto,$photo)){
                    ?>
                    <script>
                        alert("Successfully Registered");
                    </script>
                    <?php
                    header('Location: login_lawyer.php');
                }
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

<form action="<?php $_SERVER['PHP_SELF'];?>" style="border:1px solid #ccc" method="post" enctype = "multipart/form-data">
  <div class="container">
    <h1>Sign Up Lawyer</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="phone"><b>Phone No</b></label>
    <input type="tel" placeholder="Enter number" name="number" required>
    <label for="phone"><b>Appointment charge</b></label>
    <input type="text" placeholder="Enter money" name="charge" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpass" required>

    <label for="photo"><b>Upload photo</b></label>
    <input type="file"  name="photo" required>

    
    <p>have an account? <a href="login_lawyer.php" style="color:dodgerblue">Login</a>.</p>

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit" value="submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
