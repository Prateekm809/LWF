<?php
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Insert the user into the database
    $sql = "INSERT INTO webz (Email, Password) VALUES ('$email', '$password')";
    $conn->query($sql);

    // Redirect to the index page
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
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
      
a[href="admin.php"] {
 
  color: #000000; 
  text-decoration: none; 
  font-size: 16px; 
  text-align:center;

}


a[href="admin.php"]:hover {
  color: #4CAF50; 

}

    </style>
</head>
<body>
    <h1>Add User</h1>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="Email" id="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="Password" id="password" required>
        <br><br>
        <input type="submit" value="Add User">
        <a href="admin.php">Go Back</a>
    </form>
</body>
</html>

