<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Validate date format (optional, depending on frontend validation)
    // Example: Validate date format using DateTime
    if (!DateTime::createFromFormat('Y-m-d', $checkin) || !DateTime::createFromFormat('Y-m-d', $checkout)) {
        http_response_code(400); // Bad request
        echo json_encode(['error' => 'Invalid date format']);
        exit();
    }

    // Generate a unique reference number
    $reference_number = uniqid('RES-', true);

    // Calculate the number of nights
    $checkin_date = new DateTime($checkin);
    $checkout_date = new DateTime($checkout);
    $interval = $checkin_date->diff($checkout_date);
    $nights = $interval->days;

    // Prepare SQL statement with parameterized query
    $sql = "INSERT INTO reservations (name, email, checkin, checkout, reference_number) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $reference_number);

    // Execute the statement
    if ($stmt->execute()) {
        http_response_code(201); // Created
        echo json_encode(['status' => 'success', 'reference_number' => $reference_number, 'nights' => $nights]);

        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Redirect to dialoguebox.html using JavaScript
        echo '<script>window.location.href = "dialoguebox2.php";</script>';
        exit();
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Error inserting data: '. $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
