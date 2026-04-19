<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Notes Sharing</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="home">

<div class="login-box" style="width:80%; max-width:900px;">

    <h2>📘 Class Notes Sharing</h2>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Enter Title" required>
        <input type="text" name="subject" placeholder="Enter Subject">
        <input type="file" name="file" required>
        <button type="submit">Upload Notes</button>
    </form>

    <hr style="margin:20px 0; border:1px solid rgba(255,255,255,0.3);">

    <h3 style="color:white;">📂 Available Notes</h3>

    <table style="width:100%; color:white; margin-top:15px;">
        <tr>
            <th>Title</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Download</th>
            <th>Delete</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM notes ORDER BY note_id DESC");

        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['upload_date']}</td>
                <td><a href='download.php?id={$row['note_id']}'>Download</a></td>
                <td><a href='delete.php?id={$row['note_id']}'>Delete</a></td>
            </tr>";
        }
        ?>

    </table>

    <div style="margin-top:20px;">
        <a href="about.php" style="color:white;">About This Website</a> |
        <a href="logout.php" style="color:white;">Logout</a>
    </div>

</div>

</body>
</html>