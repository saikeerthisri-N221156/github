<?php
if (isset($_FILES['myfile'])) {
    $fileName=$_FILES['myfile']['name'];
    $tempName=$_FILES['myfile']['tmp_name'];

    $uploadPath='uploads/' . $fileName;
    if (move_uploaded_file($tempName, $uploadPath)) {
        echo "File uploaded successfully.<br><br>";
        echo "<a href='download.php?file=$fileName'>Download File</a>";

    } 
    else {
        echo "Error uploading file.";
 
    }

}
?>    