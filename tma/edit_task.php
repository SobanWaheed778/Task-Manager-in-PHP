<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('connection.php'); ?>
      
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Task</h1>

    <form style="margin: 30px;" method="post">
      <div class="mb-3" >


<?php

if(isset($_GET['update'])){
  $update_id = $_GET['update'];

  $fetch_query = "SELECT * FROM tasks WHERE task_id = {$update_id}";
  $fetch_result = mysqli_query($connection,$fetch_query);
  while($row = mysqli_fetch_assoc($fetch_result)){
    $task_id = $row['task_id'];
    $task_title = $row['title'];
    $task_description = $row['description'];
    $task_deadline = $row['deadline'];
    $task_priority = $row['priority'];
    $task_status = $row['status'];

?>

        <label for="taskName" class="form-label">Task Name</label>
        <input name="t_name" type="text" value="<?php if(isset($task_title)){echo $task_title;} ?>" class="form-control border-dark" id="taskName" placeholder="Enter task name" required>
      </div>
      <div class="mb-3">
        <label for="taskDescription" class="form-label">Task Description</label>
        <textarea name="t_detail" class="form-control border-dark" id="taskDescription" rows="3" placeholder="Enter task description" required>
        <?php if(isset($task_description)){echo  preg_replace('/^\s+/', '', $task_description);} ?>
        </textarea>
      </div>
      <div class="mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <input name="t_date" type="date" value="<?php if(isset($task_deadline)){echo $task_deadline;} ?>" class="form-control border-dark" id="deadline" required>
      </div>
      <div class="mb-3">
        <label for="priority" class="form-label">Priority: &nbsp;&nbsp;</label>
        <select name="t_priority" class="form-select" id="priority" required>
          <option value="<?php if(isset($task_priority)){echo $task_priority;} ?>" selected><?php {echo $task_priority;} ?></option>
          <option value="High">High</option>
          <option value="Medium">Medium</option>
          <option value="Low">Low</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status: &nbsp;&nbsp;</label>
        <select name="t_status" class="form-select" id="status">
        <option value="<?php if(isset($task_status)){echo $task_status;} ?>" selected><?php {echo $task_status;} ?></option>
          <option value="Pending">Pending</option>
          <option value="In Progress">In Progress</option>
          <option value="Completed">Completed</option>
        </select>
      </div>
      <input type="submit" class="btn btn-primary" value="UPDATE TASK" name="submit">
    </form>


<?php } }?>

<?php

if(isset($_POST['submit'])){
  $t_name= $_POST['t_name'];
  $t_detail= $_POST['t_detail'];
  $t_date = date('Y-m-d', strtotime($_POST['t_date']));
  $t_priority= $_POST['t_priority'];
  $t_status= $_POST['t_status'];

  $update_query = "UPDATE tasks SET 
  title = '{$t_name}', 
  description = '{$t_detail}', 
  deadline = '{$t_date}',
  priority = '{$t_priority}',
  status = '{$t_status}' 
  WHERE task_id = {$update_id}";

  $update_result = mysqli_query($connection,$update_query);
  header("Location: edit_task.php?update={$update_id}");
}


?>


<a class="btn btn-success"
      href="all_tasks.php"><-- Back</a>


      </div>
                </main>

  <?php include('footer.php'); ?>