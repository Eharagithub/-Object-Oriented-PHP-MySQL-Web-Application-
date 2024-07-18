<?php
session_start();

require_once 'Database.php';
require_once 'Student.php';

$db = new Database();
$connection = $db->connect();
$student = new Student($connection);

$search = isset($_GET['search']) ? $_GET['search'] : '';

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

$students = $student->getStudentByName($search);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>All Students</title>
    <link rel="stylesheet" href="Navigation/style.css" />

 
<body>
    <!-- header part -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="https://w7.pngwing.com/pngs/1005/782/png-transparent-student-college-university-term-paper-student-management-angle-people-logo.png" alt="">Student Management System
        </div>
        <div class="search_bar">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search" />
            </form>
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <?php if (isset($_SESSION['username'])) : ?>
                <p style="padding-top: 12px;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p style="padding-top: 12px;"><a href="filter.php?logout='1'" style="color: purple;">log out</a></p>
            <?php endif ?>
        </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <li class="item">
                    <a href="Navigation/index.php" class="nav_link submenu_item">
                        <span class="navlink_icon"><i class="bx bx-home-alt"></i></span>
                        <span class="navlink">Home</span>
                    </a>
                </li>
                <li class="item">
                    <a href="All_students.php" class="nav_link submenu_item">
                        <span class="navlink_icon"><i class="bx bx-grid-alt"></i></span>
                        <span class="navlink">View All Students</span>
                    </a>
                </li>
            </ul>
            <ul class="menu_items">
                <li class="item">
                    <a href="view_students.php" class="nav_link">
                        <span class="navlink_icon"><i class="bx bx-cloud-upload"></i></span>
                        <span class="navlink">Add Student</span>
                    </a>
                </li>
                <li class="item">
                    <a href="Update_students.php" class="nav_link">
                        <span class="navlink_icon"><i class="bx bxs-magic-wand"></i></span>
                        <span class="navlink">Update Details</span>
                    </a>
                </li>
                <li class="item">
                    <a href="filter.php" class="nav_link">
                        <span class="navlink_icon"><i class="bx bx-filter"></i></span>
                        <span class="navlink">Filter</span>
                    </a>
                </li>
            </ul>
            <ul class="menu_items">
                <li class="item">
                    <a href="notice_board.php" class="nav_link">
                        <span class="navlink_icon"><i class="bx bx-flag"></i></span>
                        <span class="navlink">Notice board</span>
                    </a>
                </li>
                <li class="item">
                    <a href="settings.php" class="nav_link">
                        <span class="navlink_icon"><i class="bx bx-cog"></i></span>
                        <span class="navlink">Setting</span>
                    </a>
                </li>
            </ul>
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
        <div class="box-container">

            <div class="container mt-3">
                <div class="box1">
                    <div class="box-container" style="margin-top: 25px;">

                        <div class="container mt-3">
                            <h2 style="color: #bf9eb7;">SEARCH STUDENTS</h2>
                        </div>
                        <br><br>

                        <div class="search-bar-container" style="display: flex;align-items: center;justify-content: center;margin-top: 0px;">
                            <form method="GET" action="">
                                <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" style="padding: 10px;width: 300px;border: 1px solid #ddd;border-radius: 5px 0 0 5px;font-size: 16px;" />
                                <button type="submit" style="padding: 10px 20px;border: none;background-color: #bd03c0;color: white;border-radius: 0 5px 5px 0;font-size: 16px;cursor: pointer;transition: background-color 0.3s;">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <!-- JavaScript -->
    <script src="Navigation/script.js"></script>
</body>

</html>