<?php
require_once "../config/database.php";

$id = new MongoDB\BSON\ObjectId($_GET['id']);
$user = $usersCollection->findOne(['_id' => $id]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="../backend/update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $user['_id']; ?>">
    <input type="text" name="name" value="<?php echo $user['name']; ?>"><br><br>
    <input type="text" name="email" value="<?php echo $user['email']; ?>"><br><br>
    <button type="submit">Update</button>
</form>

</body>
</html>