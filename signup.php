<?php
 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form.css">
<style>
   
   .success-message,
    .error-message {
        color: white !important;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);

        padding-top:20px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40px;
        opacity: 0;
   
        animation-name: move-left-to-right;
        animation-duration: 1s;
        animation-delay: 0.5s;
        animation-fill-mode: forwards;
        opacity: 0.9;
        background-color: rgba(0, 0, 0, 0.5);

    }

    @keyframes move-left-to-right {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
::placeholder {
  color: rgba(255, 255, 255, 0.7); /* Adjust the opacity and color as needed */
  font-weight: bold;
}

.form-style:focus::placeholder {
  color: rgba(255, 255, 255, 0.9); /* Adjust the opacity and color as needed */
}





</style>
</head>
<body>


<h1 class="nav">
        <ul class="home">
            <li class="brand">
                <img src="images/Logooo.png" alt="Learn with FuN" height="50px" width="50px" style="border-radius: 50%; padding-bottom: 5px;">
            </li>
          
            <li><a href="index.php">Home</a></li>
        </ul>
    </h1>
    <?php
   

    

    // Define variables to empty values
    $emailErr = $passErr = "";
    $email = $pass = "";

    // Input fields validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Email Validation
        if (empty($_POST["logemail"])) {
            $emailErr = "*Email is required";
        } else {
            $email = input_data($_POST["logemail"]);
            // Check if the email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["logpass"])) {
            $passErr = "*Password is required";
        } else {
            $pass = input_data($_POST["logpass"]);
            $pattern = '/^(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>]+$/';
            if (!preg_match($pattern, $pass)) {
                $passErr = "Password must contain at least one special character and one uppercase letter.";
            }
        }

        if ($emailErr == "" && $passErr == "") {
            // Registration code

            // Generate a unique identifier for the user
            $identifier = generateUniqueIdentifier();

            // Connect to the database
            $conn = mysqli_connect("localhost", "id21045657_user", "PrateekM@12112001", "id21045657_webz");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if the email already exists in the database
            $query = "SELECT * FROM webz WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) {
                // Email is not found in the database, proceed with registration
                $sql = "INSERT INTO webz (Email, Password, Identifier) VALUES ('$email', '$pass', '$identifier')";
                if (mysqli_query($conn, $sql)) {
                    // Registration successful
                    echo "<span class='success-message'>You have successfully registered.</span>";
                    echo "<p>Your unique id: $identifier</p>";
                } else {
                    echo "<span class='success-message'>Registration failed. Please try again later.</span>";
                }
            } else {
                // Email already exists in the database
                echo "<span class='success-message'>This email address is already registered. Please use a different email.</span>";
            }

            mysqli_close($conn);
        }
    }

    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function generateUniqueIdentifier()
    {
        // Generate a UUID (Universally Unique Identifier)
        return uniqid();
    }
    ?>

<form action="signup.php" method="POST">
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center ">
                    <div class="section pb-5  text-center">
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Sign up</h4>
                                            <div class="form-group">
                                                <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                                <span class="error"><?php echo $emailErr; ?></span>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                                <span class="error"><?php echo $passErr; ?></span>
                                            </div>
                                            <input type="submit" class="btn mt-4" name="submit" value="Submit">
                                            <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                                            <p class="mb-0 mt-4 text-center"><a href="form.php" class="link">Already a member? Log in</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<footer>
    
    <p>&copy; 2023 Ishita - Prateek. All Rights Reserved</p>
</footer>
</body>
</html>

