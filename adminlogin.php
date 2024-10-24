<?php
// Assuming the database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    // SQL query to check if the username and password match any record in the admin table
    $sql = "SELECT * FROM admin WHERE username='$uname' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If match found, redirect to the admin panel
        header("Location: http://127.0.0.1:5000/admin");
        exit();
    } else {
        // If no match found, display error message
        echo "Invalid username or password";
    }
}

$conn->close();
?>
