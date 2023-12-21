<?php
include 'config.php';

// Get the user ID from the URL parameter
$id = $_GET['id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Update the user in the database
    $sql = "UPDATE webz SET Email='$email', Password='$password' WHERE id=$id";
    $conn->query($sql);

    // Redirect to the index page
    header('Location: edit.php?id='.$id);
    exit;
}

// Fetch the user details from the database
$sql = "SELECT * FROM webz WHERE id=$id";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found. ID: " . $id;
        exit;
    }
} else {
    echo "Error executing the query: " . $conn->error;
    exit;
}
// Redirect to the admin.php page

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .toggle-password {
            margin-top: 10px;
            text-align: right;
        }
        .toggle-password button {
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            color: #555;
            cursor: pointer;
            text-decoration: underline;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #555;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="Email" id="email" value="<?php echo $row['Email']; ?>" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="Password" id="password" value="<?php echo $row['Password']; ?>" required>
        <br>
        <div class="toggle-password">
            <button type="button" onclick="togglePasswordVisibility()">Show Password</button>
        </div>
        <br>
        <input type="submit" value="Update User">
        <a href="admin.php">Go Back</a>
    </form>
</body>
</html>

