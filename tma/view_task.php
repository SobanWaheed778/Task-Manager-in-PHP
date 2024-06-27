<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('connection.php'); ?>

      
      <!-- Page Content -->
      <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Task Details</h1>

<?php 
if(isset($_GET['t_id'])){
  $task_id = $_GET['t_id'];

  $query = "SELECT * FROM tasks WHERE task_id = {$task_id}";
  $result = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($result)){
    $task_id = $row['task_id'];
    $task_title = $row['title'];
    $task_description = $row['description'];
    $task_deadline = $row['deadline'];
    $task_priority = $row['priority'];
    $task_status = $row['status'];
?>


  <div class="container">
    <div style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-top: 40px; margin-left: 40px; background-color:#cccccc; padding-left: 60px;">
      <h3 style="margin: 20px; text-decoration: underline;">Task Details</h3>
      <p><strong>Task Name:</strong>&nbsp; <mark style="background-color: white;"><?php if(isset($task_title)){echo $task_title;} ?></mark></p>
      <p style="font-style:italic;"><strong style="background-color:yellow;">Task Description:</strong>&nbsp; <mark style="background-color: white;"><?php if(isset($task_description)){echo $task_description;} ?></mark></p>
      <p><strong>Deadline:</strong>&nbsp; <mark style="background-color: white;"><?php if(isset($task_deadline)){echo $task_deadline;} ?></mark></p>
      <p><strong>Priority:</strong>&nbsp; <mark style="background-color: white;"><?php if(isset($task_priority)){echo $task_priority;} ?></mark></p>
      <p><strong>Status:</strong>&nbsp; <mark style="background-color: white;"><?php if(isset($task_status)){echo $task_status;} ?></mark></p>
    </div>
  </div>
  <a href="all_tasks.php" class="btn btn-success m-3"><-- Back</a>
        
 
  <?php
  }
}
?>  


</div>
                </main>
  <?php include('footer.php'); ?>