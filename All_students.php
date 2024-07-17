<?php
session_start();

require_once 'Database.php';
require_once 'Student.php';

$db = new Database();
$connection = $db->connect();
$student = new Student($connection);

$students = $student->getAllStudents();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include("header.php"); ?>


<div class="content">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
</div>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>All Students</title>
    <link rel="stylesheet" href="Navigation/style.css" />
</head>

<body>

    <!-- header part -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="#" alt="">Student Management System
        </div>
        <div class="search_bar">
            <input type="text" placeholder="Search" />
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <?php if (isset($_SESSION['username'])) : ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p><a href="All_students.php?logout='1'" style="color: red;">logout</a></p>
            <?php endif ?>
            <!-- <img src="images/profile.jpg" alt="" class="profile" /> -->
        </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dahsboard"></div>
                <li class="item">
                    <a href="Navigation/index.php" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </a>
                </li>
                <li class="item">
                    <a href="All_students.php" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-grid-alt"></i>
                        </span>
                        <span class="navlink">View All Students</span>
                    </a>
                </li>
            </ul>
            <ul class="menu_items">
                <div class="menu_title menu_editor"></div>
                <li class="item">
                    <a href="view_students.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-cloud-upload"></i>
                        </span>
                        <span class="navlink">Add Student</span>
                    </a>
                </li>
                <li class="item">
                    <a href="Update_students.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-magic-wand"></i>
                        </span>
                        <span class="navlink">Update Details</span>
                    </a>
                </li>
                <li class="item">
                    <a href="filter.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-filter"></i>
                        </span>
                        <span class="navlink">Filter</span>
                    </a>
                </li>

            </ul>
            <ul class="menu_items">
                <div class="menu_title menu_setting"></div>
                <li class="item">
                    <a href="notice_board.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-flag"></i>
                        </span>
                        <span class="navlink">Notice board</span>
                    </a>
                </li>
                <li class="item">
                    <a href="settings.php" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-cog"></i>
                        </span>
                        <span class="navlink">Setting</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span>Expand</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span>Collapse</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>

    <!--main part-->
    <div class="main">

        <!-- <div class="container mt-3"> -->
        <div class="box1">
            <h2>ALL STUDENTS</h2>

        </div>

        <table class="table table-hover table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Age</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $row) : ?>
                    <tr>
                        <td><?php echo $row['Id']; ?> </td>
                        <td><?php echo $row['f_name']; ?> </td>
                        <td><?php echo $row['l_name']; ?> </td>
                        <td><?php echo $row['address']; ?> </td>
                        <td><?php echo $row['age']; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- 
    <?php
    if (isset($_GET['message'])) {
        echo "<h5>" . $_GET['message'] . "</h5>";
    }
    if (isset($_GET['insert_msg'])) {
        echo "<h6>" . $_GET['insert_msg'] . "</h6>";
    }
    if (isset($_GET['update_msg'])) {
        echo "<h6>" . $_GET['update_msg'] . "</h6>";
    }
    if (isset($_GET['delete_msg'])) {
        echo "<h5>" . $_GET['delete_msg'] . "</h5>";
    }
    ?> -->

    </div>

    </form>

    <?php include("footer.php"); ?>
     <!-- JavaScript -->
     <script src="../script.js"></script>
</body>

</html>