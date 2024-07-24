<?php
include 'db.php'; // Ensure you include your database connection file

// Initialize variables
$reference_number = '';
$message = '';
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate date format
    if (!DateTime::createFromFormat('Y-m-d', $checkin) || !DateTime::createFromFormat('Y-m-d', $checkout)) {
        $errors[] = "Invalid date format. Please use YYYY-MM-DD.";
    }

    // If there are no validation errors
    if (empty($errors)) {
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
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sssss", $name, $email, $checkin, $checkout, $reference_number);

        // Execute the statement
        if ($stmt->execute()) {
            // Close statement and connection
            $stmt->close();
            $conn->close();

            // Redirect to confirmation page
            header('Location: reservation.php?reference_number=' . urlencode($reference_number));
            exit();
        } else {
            $errors[] = "Error inserting data: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <style>
        /* Global reset and basic styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

.container {
    max-width: 600px;
    margin: auto;
}

.content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

form .reservation-form {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}

.error {
    background-color: #ffe5e5;
    color: #ff0000;
    padding: 10px;
    border: 1px solid #f0c0c0;
    border-radius: 4px;
    margin-top: 10px;
}

.error p {
    margin-bottom: 5px;
}

        </style>
</head>
<body>

<?php if (isset($_GET['reference_number'])): ?>
    <h2>Reservation Confirmed</h2>
    <p>Your reservation has been successfully created.</p>
    <p>Reference Number: <?php echo htmlspecialchars($_GET['reference_number']); ?></p>
<?php else: ?>
    <h2> Extend Date</h2>
    <form action="reservation.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="checkin">Check-in Date:</label>
        <input type="date" id="checkin" name="checkin" required>
        <br><br>

        <label for="checkout">Checkout Date:</label>
        <input type="date" id="checkout" name="checkout" required>
        <br><br>

        <input type="submit" value="Submit">
    </form>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div style="color: red;">
        <?php foreach ($errors as $error): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>
