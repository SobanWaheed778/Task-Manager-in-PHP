<?php ob_start(); ?>
<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<?php include('connection.php'); ?>

<?php
if (!isset($_SESSION['username'])) {
    header("Location: ./login_form.php");
    exit;
}
?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4" style="margin-top: 0px;">
                        <h1 class="my-4">Dashboard</h1>
    
                        <div class="row justify-content-center">
            <div class="col-md-4 mb-4 col-sm-6">
                <div class="card bg-light border-primary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-tasks"></i> All Tasks</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php
                        $query = "SELECT * FROM tasks WHERE user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?>
                        &nbsp; <a href="all_tasks.php" style="font-size:16px;">View Detail</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title" style="color:red;"><i class="fas fa-bell"></i> Notifications</h5>
                        <p class="card-text">



                        <?php 
                        // Calculate the date one week from today
                        $one_week_from_now = date('Y-m-d', strtotime('+1 week'));
                        // Query to count incomplete tasks with deadlines within the week
                        $query = "SELECT COUNT(*) AS num_incomplete_within_week 
                                  FROM tasks 
                                  WHERE (status = 'In Progress' OR status = 'Pending') 
                                  AND deadline <= '$one_week_from_now' and user_id = '{$_SESSION['user_id']}'";

                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        $num_incomplete_within_week = $row['num_incomplete_within_week'];
                        // Notification message
                        if ($num_incomplete_within_week > 0) {
                            echo "You have $num_incomplete_within_week incomplete tasks with deadlines within the week.";
                        } else {
                            echo "You have no incomplete tasks with deadlines within the week.";
                        }
                        ?>





                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light border-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-check-circle"></i> Completed Tasks</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php 
                        $query = "SELECT * FROM tasks WHERE status = 'Completed' and user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light border-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-pencil-alt"></i> In Progress Tasks</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php 
                        $query = "SELECT * FROM tasks WHERE status = 'In Progress' and user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light border-danger">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hourglass-half"></i> Pending Tasks</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php 
                        $query = "SELECT * FROM tasks WHERE status = 'Pending' and user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?></p>
                    </div>
                </div>
            </div>
            <div style="width: 100%; padding: 10px">
                <h5>PRIORITIZED TASKS INFO</h5>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light border-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> High Priority</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php 
                        $query = "SELECT * FROM tasks WHERE priority = 'High' and user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light border-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i> Medium Priority</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php 
                        $query = "SELECT * FROM tasks WHERE priority = 'Medium' and user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light border-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle"></i> Low Priority</h5>
                        <p class="card-text" style="font-size: 22px">
                        <?php 
                        $query = "SELECT * FROM tasks WHERE priority = 'Low' and user_id = '{$_SESSION['user_id']}'";
                        $result= mysqli_query($connection,$query);
                        $number = mysqli_num_rows($result);
                        echo $number;
                        ?></p>
                    </div>
                </div>
            </div>
        
        </div>                        


                        
                        
                    </div>
                </main>



<?php include('footer.php'); ?>