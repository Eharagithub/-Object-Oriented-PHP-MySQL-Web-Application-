<?php
class Student {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllStudents() {
        $query = "SELECT * FROM students";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($f_name, $l_name, $address, $age) {
        $query = "INSERT INTO students (f_name, l_name, address, age) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$f_name, $l_name, $address, $age]);
    }

    public function deleteStudent($id) {
        $query = "DELETE FROM students WHERE Id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    public function getStudentByName($f_name) {
        $query = "SELECT * FROM students WHERE f_name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$f_name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStudent($id, $f_name, $l_name, $address, $age) {
        $query = "UPDATE students SET f_name = ?, l_name = ?, address = ?, age = ? WHERE Id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$f_name, $l_name, $address, $age, $id]);
    }
}
?>
