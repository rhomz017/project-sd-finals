<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM notes WHERE note_id=$id");
$row = $result->fetch_assoc();

unlink($row['file_path']);

$conn->query("DELETE FROM notes WHERE note_id=$id");

header("Location: index.php");
?>