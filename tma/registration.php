<?php include("connection.php"); ?>
<?php

if(isset($_POST['register'])){
  $username= $_POST['username'];
  $email= $_POST['email'];
  $password= $_POST['password'];


$password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 10)); 
  $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
  $result = mysqli_query($connection,$query);

   if($result){
    $message = "Values Submitted Successfully";
    }else {
    $error = "QUERY FAILED". mysqli_error($connection);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRATION PAGE</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom Styles */
    .registration-form {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 7px;
      padding: 20px;
      border: 2px solid black;
      border-radius: 10px;
      background-color: #96CFE0;
      box-shadow: 0px 0px 30px 10px rgba(0,0,0,0.5);
      transition: transform 0.3s ease;
    }
    .registration-form:hover {
      transform: scale(1.02);
    }
    .registration-form h3 {
      text-align: center;
      margin-bottom: 20px;
    }
    .background-image-container {
      background-image: url('./images/bg.jpg'); 
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="background-image-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="registration-form" method="post" action="" autocomplete="off">
            <h3>REGISTRATION PAGE</h3>

<?php 
    if(isset($message)){
      echo "<p style='color:red;'>$message</p>";
    }elseif(isset($error)){
      echo "<p style='color:red;'>$error</p>";
    }
?>
            


            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Register" name="register"><br>
            <div>
                <p>already have an account? &nbsp;<a href="login_form.php">LOGIN</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>