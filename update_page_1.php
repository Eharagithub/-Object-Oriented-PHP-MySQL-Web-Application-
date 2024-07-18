<?php include("header.php"); ?>
<?php include("Database.php"); ?>

<!--bring the data to the table-->
<?php
$db = new Database();
$conn = $db->connect();

// Fetch the data to display in the form
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];

    $query = "SELECT * FROM students WHERE Id = :Id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':Id', $Id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!--update the table-->
<?php
if(isset($_POST['update_student'])){

if(isset($_GET['Id_new'])){
    $Id_new =$_GET['Id_new'];
}

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $address = $_POST['address'];
    $age = $_POST['age'];

    $query = "UPDATE students SET f_name = :f_name, l_name = :l_name, address = :address, age = :age WHERE Id = :Id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':f_name', $f_name);
    $stmt->bindParam(':l_name', $l_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':Id', $Id_new);

    if($stmt->execute()){
        header('location:All_students.php?update_msg=You have successfully updated the data');
    } else {
        die("Query Failed: " . $stmt->errorInfo()[2]);
    }
}
?>


<form action="update_page_1.php?Id_new=<?php echo $Id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" id="studentFirstName" value="<?php echo $row['f_name'] ?>">
    </div>
    <div class="form-group">
        <label for="l_Name">Last Name</label>
        <input type="text" name="l_name" class="form-control" id="studentLastName" value="<?php echo $row['l_name'] ?>">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" id="studentAddress" value="<?php echo $row['address'] ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" id="studentAge" value="<?php echo $row['age'] ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="update_student" value="Update" class="btn btn-success">
    </div>
</form>

<?php include("footer.php"); ?>