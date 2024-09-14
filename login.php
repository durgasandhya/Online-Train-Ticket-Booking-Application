<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the configuration file
    include 'config.php';

    // Get database connection
    $conn = get_db_connection();

    $email = $_POST['username'];
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array("status" => "error", "message" => "Enter a valid email."));
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT fullName, password FROM login WHERE email = ?");
    if (!$stmt) {
        echo json_encode(array("status" => "error", "message" => "SQL error: " . $conn->error));
        exit;
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($fullName, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    // Check if the username exists in the database
    if ($dbPassword) {
        // Check if the password matches
        if ($password === $dbPassword) {
            $_SESSION['username'] = $fullName;
            $_SESSION['loggedin'] = true;

            echo json_encode(array("status" => "success", "message" => "Login successful!", "firstName" => $fullName));
        } else {
            echo json_encode(array("status" => "error", "message" => "Password does not match."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Email not found."));
    }

    $conn->close();
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
