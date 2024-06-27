<?php 
include('connection.php');
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}
$user_id = mysqli_real_escape_string($connection, $_SESSION['user_id']);
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);
if (!$result) {
    echo "Error: " . mysqli_error($connection);
    exit();
}
$row = mysqli_fetch_assoc($result);
$db_username = $row['username'];
?>
<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Task Manager App</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 text-light">
                <p style="margin: auto;">Welcome Dear &nbsp;<b><?php echo $db_username; ?></b></p>
            </div>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav m-4" style="padding-top: 10px;">
                            
                        <a class="nav-link <?php if ($current_page == 'home.php') echo 'active'; ?>" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link <?php if ($current_page == 'add_tasks.php') echo 'active'; ?>" href="add_tasks.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            Add Tasks
                        </a>

                        
                        <a class="nav-link <?php if ($current_page == 'all_tasks.php') echo 'active'; ?>" href="all_tasks.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            All Tasks
                        </a>

                        <a class="nav-link <?php if ($current_page == 'profile.php') echo 'active'; ?>" href="profile.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            User Profile
                        </a>

                            <a class="text-light btn btn-danger w-50 m-4" href="logout.php">
                                Logout
                            </a>
                            
                        </div>
                        <div class="container-fluid p-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; by <b>Soban Waheed 2024.</b></div>
                            </div>
                        </div> 
                    </div>
                </nav>
            </div>