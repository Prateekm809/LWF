<?php

$conn = mysqli_connect("localhost:3307", "root", "", "webz") or die("Connection failed");

if (isset($_POST['submit'])) {
    $email = $_POST['logemail'];
    $password = $_POST['logpass'];

    $errors = array();

    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if ($username === 'admin@gmail.com' && $password === 'Admin#1') {
        // Redirect the user to admin.php
        header('Location: admin.php');
        exit;
    } 
}


    if (empty($errors)) {
        $sql = "SELECT * FROM webz WHERE Email = '$email' AND Password = '$password'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Successful login
            echo "<h1>Welcome $email</h1>";

            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'learn.php';
                    }, 3000);
                  </script>";
        } else {
            // Invalid login
            echo "Invalid email or password";
        }
    }

?>

