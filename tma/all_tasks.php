<?php 
ob_start(); // Start output buffering
include('header.php');
include('navigation.php');
include('connection.php');

?>

<style>
    @media (max-width: 767px) {
        .task-table th,
        .task-table td {
            font-size: 10px; 
            padding: 6px 3px; 
        }
        .task-buttons button{
            font-size: 10px;
            padding: 4px 8px;
        }
        
    }
</style> 

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Tasks</h1>


    <a style="margin: auto;" class="btn btn-success"
      href="add_tasks.php">Add New Task</a>
    <div style="margin-right: 20px; margin-top: 25px;">
        <table class="table task-table">
            <thead>
                <tr>
                    <th>Task ID</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM tasks WHERE user_id = '{$_SESSION['user_id']}'";
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($result)){
                    $task_id = $row['task_id'];
                    $task_title = $row['title'];
                    $task_description = $row['description'];
                    $task_deadline = $row['deadline'];
                    $task_priority = $row['priority'];
                    $task_status = $row['status'];
                    
                    // Output each task row
                    echo "<tr class='task-row'>";
                    echo "<td>$task_id</td>";
                    echo "<td class='task-name'>$task_title</td>";
                    echo "<td class='text-success'>click <b>read</b> to view description.</td>";
                    echo "<td>$task_deadline</td>";
                    echo "<td>$task_priority</td>";
                    echo "<td>$task_status</td>";
                    echo "<td>";
                    echo "<div class='btn-group task-buttons'>
                                <a href='./view_task.php?t_id=$task_id'><button type='button' class='btn btn-warning btn-sm'>
                                    <i class='fas fa-book'></i> read
                                </button></a> &nbsp;&nbsp;&nbsp;
                                <a href='edit_task.php?update={$task_id}'><button type='button' class='btn btn-primary btn-sm'>
                                    <i class='fas fa-edit'></i> edit
                                </button></a> &nbsp;&nbsp;&nbsp;
                                <a href='all_tasks.php?delete={$task_id}'><button type='button' class='btn btn-danger btn-sm'>
                                    <i class='fas fa-trash-alt'></i> delete
                                </button></a>
                            </div>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
                </main>
                

<?php
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $delete_query = "DELETE FROM tasks WHERE task_id = {$delete}";
    $delete_result = mysqli_query($connection, $delete_query);
    header("Location: all_tasks.php"); 
}
?>

<?php ob_end_flush(); ?>
<?php include('footer.php'); ?>