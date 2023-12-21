<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define variables to empty values
$emailErr = $passErr = "";
$email = $pass = "";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation code

    if (empty($_POST["fullName"])) {
        $errors["fullName"] = "Full name is required";
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    if (empty($_POST["address"])) {
        $errors["address"] = "Address is required";
    }

    if (empty($_POST["city"])) {
        $errors["city"] = "City is required";
    }

    if (empty($_POST["state"])) {
        $errors["state"] = "State is required";
    }

    if (empty($_POST["zipCode"])) {
        $errors["zipCode"] = "ZIP code is required";
    } elseif (!preg_match("/^\d{6}$/", $_POST["zipCode"])) {
        $errors["zipCode"] = "Invalid ZIP code format";
    }
    
    if (empty($_POST["cardName"])) {
        $errors["cardName"] = "Name on card is required";
    }

    if (empty($_POST["cardNumber"])) {
        $errors["cardNumber"] = "Credit card number is required";
    } elseif (!preg_match("/^\d{16}$/", $_POST["cardNumber"])) {
        $errors["cardNumber"] = "Invalid credit card number format";
    }
    
    if (empty($_POST["expMonth"])) {
        $errors["expMonth"] = "Expiration month is required";
    } elseif (!preg_match("/^(0?[1-9]|1[0-2])$/", $_POST["expMonth"])) {
        $errors["expMonth"] = "Invalid expiration month";
    }
    
    if (empty($_POST["expYear"])) {
        $errors["expYear"] = "Expiration year is required";
    } elseif (!preg_match("/^(202[3-9]|20[3-4][0-9]|2050)$/", $_POST["expYear"])) {
        $errors["expYear"] = "It should be 2023 or more";
    }
    
    if (empty($_POST["cvv"])) {
        $errors["cvv"] = "CVV is required";
    } elseif (!preg_match("/^\d{3}$/", $_POST["cvv"])) {
        $errors["cvv"] = "Invalid CVV";
    }

    if (empty($errors)) {
        // Connect to the database
        $conn = mysqli_connect("localhost", "id21045657_user", "PrateekM@12112001", "id21045657_webz");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Update the payment status in the database
        $paymentMade = 1; // Set PaymentMade to 1
        
        // Prepare the update query
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        echo "$email";
        $updateQuery = "UPDATE webz SET PaymentMade = $paymentMade WHERE Email = '$email'";
        
        // Debug statement
       
        if (mysqli_query($conn, $updateQuery)) {
            // Update successful
            echo " Success! Now you can login wait 2 seconds...";
            echo '<meta http-equiv="refresh" content="3;URL=form.php">';
        } else {
            echo "Error updating payment status in the database: " . mysqli_error($conn);
        }
        
        
        mysqli_close($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Payment.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div class="row">
            <div class="col">
                <h3 class="title">billing address</h3>
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="fullName" placeholder="Enter Your Name" value="<?php echo isset($_POST["fullName"]) ? $_POST["fullName"] : ''; ?>">
                    <?php if (isset($errors["fullName"])) : ?>
                        <p class="error"><?php echo $errors["fullName"]; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" placeholder="use the Registred Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                    <?php if (isset($errors["email"])) : ?>
                        <p class="error"><?php echo $errors["email"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="houseNo. - street - locality" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>">
                    <?php if (isset($errors["address"])) : ?>
                        <p class="error"><?php echo $errors["address"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city" placeholder="Enter Your City" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
                    <?php if (isset($errors["city"])) : ?>
                        <p class="error"><?php echo $errors["city"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" placeholder="Enter Your State" value="<?php echo isset($_POST["state"]) ? $_POST["state"] : ''; ?>">
                        <?php if (isset($errors["state"])) : ?>
                            <p class="error"><?php echo $errors["state"]; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" name="zipCode" placeholder="123456" value="<?php echo isset($_POST["zipCode"]) ? $_POST["zipCode"] : ''; ?>">
                        <?php if (isset($errors["zipCode"])) : ?>
                            <p class="error"><?php echo $errors["zipCode"]; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <h3 class="title">payment</h3>
                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="cardName" placeholder="Enter Full Name" value="<?php echo isset($_POST["cardName"]) ? $_POST["cardName"] : ''; ?>">
                    <?php if (isset($errors["cardName"])) : ?>
                        <p class="error"><?php echo $errors["cardName"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="text" name="cardNumber" placeholder="1111-2222-3333-4444" value="<?php echo isset($_POST["cardNumber"]) ? $_POST["cardNumber"] : ''; ?>">
                    <?php if (isset($errors["cardNumber"])) : ?>
                        <p class="error"><?php echo $errors["cardNumber"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBox">
                    <span>exp month:</span>
                    <input type="text" name="expMonth" placeholder="01" value="<?php echo isset($_POST["expMonth"]) ? $_POST["expMonth"] : ''; ?>">
                    <?php if (isset($errors["expMonth"])) : ?>
                        <p class="error"><?php echo $errors["expMonth"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>exp year:</span>
                        <input type="text" name="expYear" placeholder="2025" value="<?php echo isset($_POST["expYear"]) ? $_POST["expYear"] : ''; ?>">
                        <?php if (isset($errors["expYear"])) : ?>
                            <p class="error"><?php echo $errors["expYear"]; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="inputBox">
                        <span>cvv:</span>
                        <input type="text" name="cvv" placeholder="123" value="<?php echo isset($_POST["cvv"]) ? $_POST["cvv"] : ''; ?>">
                        <?php if (isset($errors["cvv"])) : ?>
                            <p class="error"><?php echo $errors["cvv"]; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="Identifier" value="<?php echo uniqid(); ?>">
        <input type="submit" value="Start My Free Trial" class="submit-btn">
    </form>
</div>
</body>
</html>
