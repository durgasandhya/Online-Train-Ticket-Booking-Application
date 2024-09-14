<?php
// config.php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sandhyadb');

// Function to establish a database connection
function get_db_connection() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
    }
    return $conn;
}
?>
