<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header content here if needed -->
    </header>

    <main>
        <section class="reservation-form">
            <h2>Book Your Stay</h2>
            <form action="reservation.php" method="POST" id="reservationForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" autocomplete="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" autocomplete="email" required>
                </div>
                
                <div class="form-group">
                    <label for="checkin">Check-in Date:</label>
                    <input type="date" id="checkin" name="checkin" autocomplete="checkin" required>
                </div>
                
                <div class="form-group">
                    <label for="checkout">Check-out Date:</label>
                    <input type="date" id="checkout" name="checkout" autocomplete="checkout" required>
                </div>
                
                <button type="submit">Reserve</button>
            </form>
            <div id="response">

                <?php
                if (isset($_GET['status']) && $_GET['status'] == 'success') {
                    echo '<p>Reservation successful!</p>';
                    echo '<p>Reference Number: ' . htmlspecialchars($_GET['ref']) . '</p>';
                    echo '<p>Number of Nights: ' . htmlspecialchars($_GET['nights']) . '</p>';

                   
                }
                ?>
            </div>
        </section>
        </main>
   
    <script src="1script.js"></script>
</body>
</html>
