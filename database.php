// Example of database.php
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "hotel_reservation";

$conn = new mysqli($hostname, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
