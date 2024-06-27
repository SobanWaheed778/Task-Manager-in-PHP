<?php include('connection.php'); ?>
<?php session_start(); ?>

<?php 

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_email = $row['email'];
        $db_password = $row['password'];        

        // Verify password
        if (password_verify($password, $db_password)) {
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['email'] = $db_email;
            $_SESSION['password'] = $db_password;
            header("Location: ./home.php");
            exit; // Stop further execution
        } else {
            header("Location: login_form.php"); // Incorrect password
            exit;
        }
    } else {
        header("Location: login_form.php"); // User not found
        exit;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom Styles */
    .background-image-container {
      background-image: url('./images/bg.jpg'); 
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-form {
      max-width: 400px;
      padding: 20px;
      border: 2px solid black;
      border-radius: 10px;
      background-color: #96CFE0; /* Matching background color with registration form */
      box-shadow: 0px 0px 30px 10px rgba(0,0,0,0.5);
      transition: transform 0.3s ease;
    }
    .login-form:hover {
      transform: scale(1.02);
    }
    .login-form h3 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="background-image-container">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form class="login-form" method="post" action="" autocomplete="off">
            <h3>Login Page</h3>

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
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Login" name="login"><br>
            <div>
                <p>Don't have an account? &nbsp;<a href="registration.php">Register here</a></p>
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
