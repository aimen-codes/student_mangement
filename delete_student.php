<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn, $sql)){
    header("Location: list_student.php");
} else {
    echo "Error: ". mysqli_error($conn);
}
?>