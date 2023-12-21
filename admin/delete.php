<?php
include 'config.php';

// Get the user ID from the URL parameter
$id = $_GET['id'];

// Delete the user from the database
$sql = "DELETE FROM webz WHERE id=$id";
$conn->query($sql);

// Redirect to the index page
header('Location: admin.php');
exit;
?>
