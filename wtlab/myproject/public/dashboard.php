<!-- <?php
session_start();
require_once "../config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$users = $usersCollection->find();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['user_name']; ?></h2>
<a href="../backend/logout.php">Logout</a>

<h3>All Users</h3>

<table border="1">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
    <td><?php echo $user['name']; ?></td>
    <td><?php echo $user['email']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $user['_id']; ?>">Edit</a>
        |
        <a href="../backend/delete.php?id=<?php echo $user['_id']; ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html> -->
<?php
session_start();
require_once "../config/database.php";

$result = $conn->query("SELECT * FROM users");
?>

<h2>Welcome <?php echo $_SESSION['user_name']; ?></h2>

<table border="1">
<tr>
<th>Name</th>
<th>Email</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
</tr>
<?php endwhile; ?>
</table>