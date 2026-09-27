<?php
class StudentModel {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    // PART 1.1: Profile for session user (Updated to include profile_pic)
    public function getStudentById($id) {
        $stmt = $this->conn->prepare("SELECT id, name, nric, program, marks, profile_pic FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // PART 1.2: verify and update password
    public function verifyPassword($id, $password) {
        $stmt = $this->conn->prepare("SELECT password FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result && password_verify($password, $result['password']);
    }

    public function updatePassword($id, $new_hashed_password) {
        $stmt = $this->conn->prepare("UPDATE students SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $new_hashed_password, $id);
        return $stmt->execute();
    }

    // PART 1.3: Update Profile Picture
    public function updateProfilePic($id, $filename) {
        $stmt = $this->conn->prepare("UPDATE students SET profile_pic = ? WHERE id = ?");
        $stmt->bind_param("si", $filename, $id);
        return $stmt->execute();
    }

    // PART 2.2: CRUD operations
    public function getAllStudents() {
        return $this->conn->query("SELECT * FROM students ORDER BY id ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function addStudent($name, $nric, $program, $marks, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO students (name, nric, program, marks, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $nric, $program, $marks, $hash);
        return $stmt->execute();
    }

    public function updateStudent($id, $name, $nric, $program, $marks) {
        $stmt = $this->conn->prepare("UPDATE students SET name=?, nric=?, program=?, marks=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $nric, $program, $marks, $id);
        return $stmt->execute();
    }

    public function deleteStudent($id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>