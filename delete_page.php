<?php
include("Database.php");

$db = new Database();
$conn = $db->connect();

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];

    $query = "DELETE FROM students WHERE Id = :Id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':Id', $Id);

    if($stmt->execute()){
        header('location:view_students.php?delete_msg=You have deleted a record.');
    } else {
        die("Query Failed: " . $stmt->errorInfo()[2]);
    }
}
?>
