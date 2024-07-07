<?php 
include 'Database.php';
include 'Student.php';

// Connect to the database
$db = new Database();
$connection = $db->connect();

// Instantiate the Student class
$student = new Student($connection);

if (isset($_POST['add_student'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $address = $_POST['address'];
    $age = $_POST['age'];



        if ($f_name == "" || empty($f_name)) {
            header('location:view_students.php?message=You need to fill in the First name!');
        } else if ($l_name == "" || empty($l_name)) {
            header('location:view_students.php?message=You need to fill in the Last name!');
        } else if ($address == "" || empty($address)) {
            header('location:view_students.php?message=You need to fill in the Address!');
        } else if ($age == "" || empty($age)) {
            header('location:view_students.php?message=You need to fill in the Age!');
        } else {
            if ($student->addStudent($f_name, $l_name, $address, $age)) {
                header('location:view_students.php?insert_msg=Your data has been added successfully');
            } else {
                header('location:view_students.php?message=Failed to add student');
            }
        }
    

}
?>