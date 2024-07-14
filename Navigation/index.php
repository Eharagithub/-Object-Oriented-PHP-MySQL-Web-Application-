<?php
session_start();
require_once '../Database.php'; // Adjusted path
require_once '../Student.php';  // Adjusted path

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php'); // Adjusted path
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../login.php"); // Adjusted path
    exit();
}

$db = new Database();
$connection = $db->connect();
$student = new Student($connection);

$students = $student->getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Admin panel</title>
    <link rel="stylesheet" href="style.css" />
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
                <p><a href="view_students.php?logout='1'" style="color: red;">logout</a></p>
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
                    <div class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </div>
                </li>
                <li class="item">
                    <a href="../All_students.php" class="nav_link submenu_item"> <!-- Adjusted path -->
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
                    <a href="../view_students.php" class="nav_link"> <!-- Adjusted path -->
                        <span class="navlink_icon">
                            <i class="bx bx-cloud-upload"></i>
                        </span>
                        <span class="navlink">Add Student</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Update_students.php" class="nav_link"> <!-- Adjusted path -->
                        <span class="navlink_icon">
                            <i class="bx bxs-magic-wand"></i>
                        </span>
                        <span class="navlink">Update Details</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../filter.php" class="nav_link"> <!-- Adjusted path -->
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
                    <a href="../notice_board.php" class="nav_link"> <!-- Adjusted path -->
                        <span class="navlink_icon">
                            <i class="bx bx-flag"></i>
                        </span>
                        <span class="navlink">Notice board</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../settings.php" class="nav_link"> <!-- Adjusted path -->
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

        <div class="searchbar2">
            <input type="text" name="" id="" placeholder="Search">
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-button">
            </div>
        </div>

        <div class="box-container">

            <div class="box box1">
                <div class="text">
                    <h2 class="topic-heading">60.5k</h2>
                    <h2 class="topic">All Students</h2>
                </div>

                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png" alt="Views">
            </div>

            <div class="box box2">
                <div class="text">
                    <h2 class="topic-heading">150</h2>
                    <h2 class="topic">Likes</h2>
                </div>

                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png" alt="likes">
            </div>

            <div class="box box3">
                <div class="text">
                    <h2 class="topic-heading">320</h2>
                    <h2 class="topic">Comments</h2>
                </div>

                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png" alt="comments">
            </div>

            <div class="box box4">
                <div class="text">
                    <h2 class="topic-heading">Notice</h2>
                    <h2 class="topic">View here</h2>
                </div>

                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
            </div>
        </div>

        <div class="image">
            <img src="https://www.vidyalayaschoolsoftware.com/webassets/images/school_software_1.png" alt="published">

        </div>


        <!-- JavaScript -->
        <script src="../script.js"></script>
</body>

</html>