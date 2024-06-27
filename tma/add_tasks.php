<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('connection.php'); ?>

<?php 

if(isset($_POST['submit'])){
  $t_name= $_POST['t_name'];
  $t_detail= $_POST['t_detail'];
  $t_date = date('Y-m-d', strtotime($_POST['t_date']));
  $t_priority= $_POST['t_priority'];
  $t_status= $_POST['t_status'];

  $query = "INSERT INTO tasks(user_id,title,description,deadline,priority,status) 
  VALUES('" . $_SESSION['user_id'] . "','$t_name','$t_detail','$t_date','$t_priority','$t_status')";
  $result = mysqli_query($connection,$query);

  if($result){
    $message=  "Task Added Successfully!";
  }else{
    $error= "Error While Adding task";
  }
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4" style="margin-top: 0px;">
                        <h1 class="mt-4">Add a Task</h1>

<?php  
if(isset($message)){
  echo "<p style='color: green;'>$message</p>";
}elseif(isset($error)){
  echo "<p style='color: red;'>$message</p>";
} 
?>



    <form style="margin: 30px;" method="post">
      <div class="mb-3">
        <label for="taskName" class="form-label">Task Name</label>
        <input type="text" name="t_name" class="form-control border-dark" id="taskName" placeholder="Enter task name" required>
      </div>
      <div class="mb-3">
        <label for="taskDescription" class="form-label">Task Description</label>
        <textarea name="t_detail" class="form-control border-dark" id="taskDescription" rows="3" placeholder="Enter task description" required></textarea>
      </div>
      <div class="mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <input name="t_date" type="date" class="form-control border-dark" id="deadline" required>
      </div>
      <div class="mb-3">
        <label for="priority" class="form-label">Priority: &nbsp;&nbsp;</label>
        <select name="t_priority" class="form-select" id="priority" required>
          <option value="" disabled selected>Select priority</option>
          <option value="High">High</option>
          <option value="Medium">Medium</option>
          <option value="Low">Low</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status: &nbsp;&nbsp;</label>
        <select name="t_status" class="form-select" id="status" required>
        <option value="" disabled selected>Select Status</option>
          <option value="Pending">Pending</option>
          <option value="In Progress">In Progress</option>
          <option value="Completed">Completed</option>
        </select>
      </div>
      <input type="submit" value="Submit Task Values" name="submit" class="btn btn-primary">
    </form>

      </div>
                </main>

  <?php include('footer.php'); ?>