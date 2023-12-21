<?php

include 'config.php'

// Get form data
$name = $_POST['name'];
$comment = $_POST['comment'];

// Insert data into the database
$sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
