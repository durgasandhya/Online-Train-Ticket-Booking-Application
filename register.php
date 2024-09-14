<?php
// Include the configuration file
include 'config.php';

// Get database connection
$conn = get_db_connection();

$fullName = $_POST['fullName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password']; // Store password directly

// Check if email or phone number already exist
$email_check_query = "SELECT * FROM login WHERE email='$email' LIMIT 1";
$phone_check_query = "SELECT * FROM login WHERE phoneNumber='$phoneNumber' LIMIT 1";

$email_result = $conn->query($email_check_query);
$phone_result = $conn->query($phone_check_query);

$response = array();

if ($email_result->num_rows > 0) {
    $response['success'] = false;
    $response['message'] = "Email already exists";
} elseif ($phone_result->num_rows > 0) {
    $response['success'] = false;
    $response['message'] = "Phone number already exists";
} else {
    // Proceed with registration if email and phone number are unique
    $sql = "INSERT INTO login (fullName, phoneNumber, email, password) VALUES ('$fullName', '$phoneNumber', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Registration successful";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
