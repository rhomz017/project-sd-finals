<?php
include 'db.php';

$title = $_POST['title'];
$subject = $_POST['subject'];
$date = date("Y-m-d");

$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

$path = "uploads/" . $file;

move_uploaded_file($tmp, $path);

$conn->query("INSERT INTO notes(title, subject, file_path, upload_date)
VALUES('$title','$subject','$path','$date')");

header("Location: index.php");
?>