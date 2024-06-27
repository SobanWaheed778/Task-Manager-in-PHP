<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('connection.php'); ?>


<?php

$query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result)){
  $db_username = $row['username'];
  $db_email = $row['email'];
  $db_password = $row['password'];
?>
      
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Profile</h1>



    <form style="margin: 45px;" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input value="<?php if(isset($db_username)){echo $db_username;} ?>"
         type="text" name="Uusername" class="form-control border-dark" id="username" placeholder="Enter username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input value="<?php if(isset($db_email)){echo $db_email;} ?>"
         type="email" name="Uemail" class="form-control border-dark" id="email" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input value=""
         type="password" name="Upassword" class="form-control border-dark" id="password" placeholder="Enter New password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
    </form>



    </div>
                </main>

  <?php
}

?>


<?php

if(isset($_POST['update'])){
  $username = $_POST['Uusername'];
  $email = $_POST['Uemail'];
  $password = $_POST['Upassword'];


$hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

  $query = "UPDATE users SET 
  username = '{$username}', 
  email = '{$email}', 
  password = '{$hashed_password}'";

  $result = mysqli_query($connection,$query);

  Header("Location: profile.php");

}

?>
  <?php include('footer.php'); ?>