<?php
session_start();
if(!isset($_SESSION["lawyername"])){
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html>
<title>user | update </title>
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
  include 'config.php';
    $ids =$_GET['id'];
    $showquery = "SELECT * FROM lawyer WHERE Lawyer_id = '$ids'";
    $showdata = mysqli_query($con,$showquery);
    $res = mysqli_fetch_array($showdata);
     if(isset($_POST['submit'])){
      
        $name = $_POST['name'];
        $num = $_POST['number'];
        $email = $_POST['email'];
        $charge = $_POST['charge'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        $photo = $_FILES['photo']['name'];
        $tmpphoto =$_FILES['photo']['tmp_name'];
        $emailquery = "SELECT * FROM user WHERE email ='$email'";
        $query=mysqli_query($con,$emailquery);
        $emailcout = mysqli_num_rows($query);
        move_uploaded_file($tmpphoto,$photo);
            if($password === $cpassword){
                $insquery = "UPDATE lawyer SET name ='$name', phone='$num', email='$email', password='$password', charge=$charge where Lawyer_id=$ids";
                $iquery= mysqli_query($con,$insquery);
                session_start();
                session_destroy();
                header("Location: home.php");
            }else{
                ?>
            <script>
                alert("password not match");
            </script>
            <?php 
            }
        
        
     }
    ?>

<form action="<?php $_SERVER['PHP_SELF'];?>" style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>--UPDATE DETAILS--</h1>
    <p>Please fill this form update</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" value="<?php echo $res['name']?>" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $res['email']?>" required>

    <label for="phone"><b>Phone No</b></label>
    <input type="tel" placeholder="Enter number" name="number" value="<?php echo $res['phone']?>" required>
    <label for="phone"><b>Appointment charge</b></label>
    <input type="text" placeholder="Enter money" name="charge" value="<?php echo $res['charge']?>"required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" value="<?php echo $res['password']?>"required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpass" value="<?php echo $res['password']?>"required>



    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit" value="submit">Update</button>
    </div>
  </div>
</form>

</body>
</html>
