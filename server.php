<?php
session_start();
require_once 'Database.php';
require_once 'User.php';
require_once 'Student.php';

$db = new Database();
$connection = $db->connect();
$user = new User($connection);
$student = new Student($connection);

// REGISTER USER
if (isset($_POST['reg_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    $errors = $user->register($username, $email, $password_1, $password_2);
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $errors = $user->login($username, $password);
}

?>
