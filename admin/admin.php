<?php
include 'config.php';

// Fetch users from the database
$sql = "SELECT * FROM webz";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            padding: 20px 0;
            color: #333;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 4px;
        }
        a:hover {
            background-color: #45a049;
        }
        .admin-panel {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #555;
        }
        .action-links {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
    <h1>Admin Panel</h1>
    <a href="create.php">Add User</a>
    <table>
        <tr>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td class="action-links" >
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="/logout.php">Logout</a>
    </div>
</body>
</html>
