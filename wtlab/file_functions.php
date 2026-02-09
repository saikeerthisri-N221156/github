<?php
echo "<h2>PHP File Functions – Task 2</h2>";

$file = "files/sample.txt";

/* =========================================================
   FILE READ / WRITE FUNCTIONS
   ========================================================= */

/* fopen(): Opens a file in a specified mode (read/write/append) */
$fp = fopen($file, "r");

/* fread(): Reads content from an opened file */
echo "<h3>File Read / Write</h3>";
echo "<b>Using fread():</b><br>";
echo fread($fp, filesize($file));

/* fclose(): Closes an opened file */
fclose($fp);

/* fwrite(): Writes data into a file */
$fp = fopen($file, "a");
fwrite($fp, "\nNew line added using fwrite()");
fclose($fp);

/* file_put_contents(): Writes data to a file in a single function */
file_put_contents($file, "\nLine added using file_put_contents()", FILE_APPEND);

/* file_get_contents(): Reads entire file content in one statement */
echo "<br><br><b>Using file_get_contents():</b><br>";
echo file_get_contents($file);

/* file(): Reads file into an array (each line as an element) */
echo "<br><br><b>Using file():</b><br>";
print_r(file($file));

/* =========================================================
   FILE INFORMATION FUNCTIONS
   ========================================================= */

echo "<h3>File Information</h3>";

/* file_exists(): Checks whether a file exists */
echo "File exists: " . (file_exists($file) ? "Yes" : "No") . "<br>";

/* filesize(): Returns file size in bytes */
echo "File size: " . filesize($file) . " bytes<br>";

/* filetype(): Returns the type of file */
echo "File type: " . filetype($file) . "<br>";

/* fileatime(): Returns last access time */
echo "Last access time: " . date("d-m-Y H:i:s", fileatime($file)) . "<br>";

/* filemtime(): Returns last modified time */
echo "Last modified time: " . date("d-m-Y H:i:s", filemtime($file)) . "<br>";

/* filectime(): Returns last change/creation time */
echo "Change time: " . date("d-m-Y H:i:s", filectime($file)) . "<br>";

/* fileperms(): Returns file permissions */
echo "File permissions: " . fileperms($file) . "<br>";

/* fileowner(): Returns file owner ID */
echo "File owner: " . fileowner($file) . "<br>";

/* filegroup(): Returns file group ID */
echo "File group: " . filegroup($file) . "<br>";

/* fileinode(): Returns inode number */
echo "File inode: " . fileinode($file) . "<br>";

/* =========================================================
   FILE & FOLDER MANAGEMENT FUNCTIONS
   ========================================================= */

echo "<h3>File & Folder Management</h3>";

/* copy(): Copies a file */
copy($file, "files/copy.txt");
echo "File copied<br>";

/* rename(): Renames a file */
rename("files/copy.txt", "files/renamed.txt");
echo "File renamed<br>";

/* unlink(): Deletes a file */
unlink("files/renamed.txt");
echo "File deleted<br>";

/* mkdir(): Creates a new directory */
mkdir("files/newfolder");
echo "Folder created<br>";

/* rmdir(): Removes an empty directory */
rmdir("files/newfolder");
echo "Folder removed<br>";

/* is_file(): Checks if the path is a file */
echo "Is file: " . (is_file($file) ? "Yes" : "No") . "<br>";

/* is_dir(): Checks if the path is a directory */
echo "Is directory: " . (is_dir("files") ? "Yes" : "No") . "<br>";

/* =========================================================
   DIRECTORY HANDLING FUNCTIONS
   ========================================================= */

echo "<h3>Directory Handling</h3>";

/* scandir(): Lists files and folders in a directory */
echo "<b>Using scandir():</b><br>";
print_r(scandir("files"));

/* opendir(): Opens a directory handle */
/* readdir(): Reads directory contents */
/* closedir(): Closes directory handle */
echo "<br><b>Using opendir() & readdir():</b><br>";
$dir = opendir("files");
while (($f = readdir($dir)) !== false) {
    echo $f . "<br>";
}
closedir($dir);

/* getcwd(): Returns current working directory */
echo "<br>Current directory: " . getcwd() . "<br>";

/* chdir(): Changes current working directory */
chdir("files");
echo "After chdir(): " . getcwd() . "<br>";
chdir("..");

/* =========================================================
   FILE LOCKING
   ========================================================= */

echo "<h3>File Locking</h3>";

/* flock(): Locks a file to prevent multiple access */
$log = fopen("files/log.txt", "a");
if (flock($log, LOCK_EX)) {
    fwrite($log, "Log entry added safely\n");
    flock($log, LOCK_UN);
    echo "File locked and written safely<br>";
}
fclose($log);

echo "<br><b>Task 2 completed successfully</b>";
?>
