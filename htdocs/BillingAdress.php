<?php
$server = "localhost";
$username = "your_username";
$password = "your_password";
$database = "billingadress"; // Your database name

// Establish database connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$pin = $_POST['pin'];
$phone = $_POST['phone'];

// Prepare SQL statement with placeholders
$sql = "INSERT INTO adress (name, address, pin, phone, Date) VALUES (?, ?, ?, ?, current_timestamp())";

// Prepare and bind parameters
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssis", $name, $address, $pin, $phone);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    $insert = true;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Check if the data insertion was successful
if ($insert == true) {
    echo "<p class='SubmitMsg'>Thanks for submitting this form.</p>";
} else {
    echo "Failed to insert data.";
}
?>
