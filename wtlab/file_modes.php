<!DOCTYPE html>
<html>
<head>
    <title>PHP File Modes</title>
</head>
<body>

<h2>PHP File Operation Modes</h2>

<?php
$dir = "files/";
$file = $dir . "modes.txt";

/* Ensure file exists */
if (!file_exists($file)) {
    file_put_contents($file, "Initial content\n");
}

/* r */
echo "<h3>Mode r (Read only)</h3>";
$f = fopen($file, "r");
echo "<pre>" . fread($f, filesize($file)) . "</pre>";
fclose($f);



/* w */
echo "<h3>Mode w (Write only)</h3>";
$f = fopen($file, "w");
fwrite($f, "Written using w mode\n");
fclose($f);
echo "Write completed<br>";

/* a */
echo "<h3>Mode a (Append only)</h3>";
$f = fopen($file, "a");
fwrite($f, "Appended using a mode\n");
fclose($f);
echo "Append completed<br>";


/* r+ */
echo "<h3>Mode r+ (Read & Write)</h3>";
$f = fopen($file, "r+");
fwrite($f, "Updated ");
fclose($f);
echo "Updated using r+<br>";

/* w+ */
echo "<h3>Mode w+ (Read & Write)</h3>";
$f = fopen($file, "w+");
fwrite($f, "Written using w+ mode\n");
fclose($f);
echo "Overwritten using w+<br>";

/* a+ */
echo "<h3>Mode a+ (Read & Append)</h3>";
$f = fopen($file, "a+");
fwrite($f, "Added using a+ mode\n");
fclose($f);
echo "Added using a+<br>";


/* x */
echo "<h3>Mode x (Create new file)</h3>";
$newFile = $dir . "newfile.txt";
if (!file_exists($newFile)) {
    $f = fopen($newFile, "x");
    fwrite($f, "Created using x mode");
    fclose($f);
    echo "newfile.txt created<br>";
} else {
    echo "newfile.txt already exists<br>";
}

/* x+ */
echo "<h3>Mode x+ (Create new file Read & Write)</h3>";
$unique = $dir . "unique.txt";
if (!file_exists($unique)) {
    $f = fopen($unique, "x+");
    fwrite($f, "Created using x+ mode");
    fclose($f);
    echo "unique.txt created<br>";
} else {
    echo "unique.txt already exists<br>";
}
?>
</body>
</html>
