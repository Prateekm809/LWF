<?php
session_start();


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
    }
    

    if (empty($_POST["logpass"])) {
        $passErr = "*Password is required";
    } else {
        $pass = input_data($_POST["logpass"]);
    }

    // If there are no validation errors
    if (empty($emailErr) && empty($passErr)) {
        // Establish database connection
        $servername = "localhost";
        $username = "id21045657_user";
        $Password = "PrateekM@12112001";
        $database = "id21045657_webz";

        $conn = new mysqli ("localhost", "id21045657_user", "PrateekM@12112001", "id21045657_webz");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
 
       
        if ($email === 'admin@gmail.com' && $pass === 'Admin#1') {
            // Redirect the user to admin.php
            header('Location: admin/admin.php');
            exit;
        } 
        

        // Prepare and execute the query to check if the email and password match
        $stmt = $conn->prepare("SELECT * FROM webz WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

 // Initialize $row to null before the if statement
$row = null;

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['Password'] == $pass) {
        // Password matches, check if payment is done
        if ($row['PaymentMade'] == 1) {
            // Payment is done, set session variable and redirect to learn.php
            $_SESSION['email'] = $email;
            header("refresh:3;url=learn.php");
            echo "Welcome to Learn with Fun";
            exit;
        } else {
            // Payment is not done, redirect to the payment gateway
            header("refresh:3;url=PaymentGateway.php");
            echo "Please complete payment first";
            exit;
        }
    } else {
        $passErr = "Invalid password";
    }
} else {
    $emailErr = "Email not found";
}


        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
}

function input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
     ::placeholder {
  color: rgba(255, 255, 255, 0.7); 
  font-weight: bold;
}

.form-style:focus::placeholder {
  color: rgba(255, 255, 255, 0.9); 
}


    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form.css">
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

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                    <span class="error" id="emailError"><?php echo $emailErr; ?></span>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    <span class="error" id="passError"><?php echo $passErr; ?></span>
                                                </div>

                                                <input type="submit" class="btn mt-4" name="submit">
                                                <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                                                <p class="mb-0 mt-4 text-center"><a href="signup.php" class="link">Not a member? Sign up</a></p>
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

    <footer>&copy; 2023 Ishita - Prateek. All Rights Reserved</footer>
    <script>
        var emailErrorMessage = "<?php echo $emailErr; ?>";
        var passErrorMessage = "<?php echo $passErr; ?>";

        var emailErrorElement = document.getElementById("emailError");
        var passErrorElement = document.getElementById("passError");

        emailErrorElement.innerHTML = ""; // Clear existing content
        passErrorElement.innerHTML = ""; // Clear existing content

        animateErrorMessage(emailErrorMessage, emailErrorElement);
        animateErrorMessage(passErrorMessage, passErrorElement);

        function animateErrorMessage(errorMessage, errorElement) {
            var characters = errorMessage.split("");
            var index = 0;

            var intervalId = setInterval(function() {
                if (index < characters.length) {
                    errorElement.innerHTML += characters[index];
                    index++;
                } else {
                    clearInterval(intervalId);
                }
            }, 150); 
        }
    </script>
</body>
</html>
