<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name = ucwords(strtolower($name)); // Capitalize the first letter of each word
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$password = md5($password); // Hash the password

// Insert the data into the user table
$q3 = mysqli_query($con, "INSERT INTO user VALUES ('$name', '$gender', '$college', '$email', '$mob', '$password')");

if ($q3) {
    // Redirect back to the admin dashboard or show a success message
    header("location:headdash.php?q=6&msg=Student added successfully");
} else {
    // Redirect back with an error message
    header("location:headdash.php?q=6&error=" . urlencode("Failed to add student: Email Already Registered!"));
}
ob_end_flush();
?>
