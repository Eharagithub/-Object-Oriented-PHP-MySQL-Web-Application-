<?php
session_start();

require_once 'Database.php';
require_once 'Student.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

$db = new Database();
$connection = $db->connect();
$student = new Student($connection);

$students = $student->getAllStudents();
?>

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

    <?php if (isset($_SESSION['username'])) : ?>
        <div class="heading right-align">
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="view_students.php?logout='1'" style="color: red;">logout</a></p>
        </div>
    <?php endif ?>
</div>

<div class="container mt-5">
    <div class="box1">
        <h2>ALL STUDENTS</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
    </div>

    <table class="table table-hover table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
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
                    <td><a href="update_page_1.php?Id=<?php echo $row['Id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?Id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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
    ?>
</div>

<!-- Add Students Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control" id="studentFirstName" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="l_Name">Last Name</label>
                        <input type="text" name="l_name" class="form-control" id="studentLastName" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="studentAddress" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control" id="studentAge" placeholder="Enter age">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add_student" value="ADD" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include("footer.php"); ?>