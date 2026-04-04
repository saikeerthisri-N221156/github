<!DOCTYPE html>
<html>
<head>
    <title>Mini File Manager</title>
    <style>
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #444; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2>Mini File Manager</h2>

<!-- Upload -->
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <button type="submit" name="upload">Upload</button>
</form>

<br>

<?php
$dir = "uploads/";

/* Upload file */
if (isset($_POST['upload'])) {
    $name = $_FILES['myfile']['name'];
    $tmp  = $_FILES['myfile']['tmp_name'];

    if (move_uploaded_file($tmp, $dir . $name)) {
        echo "File uploaded successfully<br><br>";
    }
}

/* Delete file */
if (isset($_GET['delete'])) {
    unlink($dir . $_GET['delete']);
    header("Location: file_manager.php");
}
?>

<!-- List files -->
<table>
<tr>
    <th>File Name</th>
    <th>Size (KB)</th>
    <th>Last Modified</th>
    <th>Actions</th>
</tr>

<?php
$files = scandir($dir);

foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo "<tr>";
        echo "<td>$file</td>";
        echo "<td>" . round(filesize($dir.$file)/1024, 2) . "</td>";
        echo "<td>" . date("d-m-Y H:i:s", filemtime($dir.$file)) . "</td>";
        echo "<td>
            <a href='uploads/$file' download>Download</a> |
            <a href='file_manager.php?delete=$file'>Delete</a>
        </td>";
        echo "</tr>";
    }
}
?>
</table>

</body>
</html>
