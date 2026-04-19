<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM notes WHERE note_id = $id");
$row = $result->fetch_assoc();

$file = __DIR__ . "/" . $row['file_path'];

if (file_exists($file)) {

    $filename = basename($file);

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . rawurlencode($filename) . "\"");
    header("Content-Length: " . filesize($file));

    readfile($file);
    exit;

} else {
    echo "File not found.";
}
?>