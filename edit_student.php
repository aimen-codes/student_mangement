<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $age = $_POST['age'];

    $update = "UPDATE students SET name='$name', email='$email', course='$course', age='$age' WHERE id=$id";
    if(mysqli_query($conn, $update)){
        header("Location: list_student.php");
    } else {
        echo "Error: ". mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Student</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" value="<?= $student['course'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" value="<?= $student['age'] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update Student</button>
            <a href="list_student.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>