<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>

    <style>
        /* Global styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            line-height: 1.6; /* Improved readability */
        }

        /* Header styles */
        header {
            background-color: #ffffff;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .logo img {
            height: 50px;
            width: 50px;
            border-radius: 50%; /* Rounded logo */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 1rem;
        }

        nav ul li a {
            text-decoration: none;
            color: #333333;
            font-weight: bold;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
            display: block;
        }

        nav ul li:hover {
            background-color: #f0f0f0; /* Change background on hover */
        }

        nav ul li:hover a {
            color: #4CAF50; /* Change text color of anchor on hover */
        }

        .auth-buttons {
            margin-left: auto; /* Pushes auth buttons to the right */
        }

        .auth-buttons a {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 1rem;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
        }

        .auth-buttons a:hover {
            background-color: #45a049;
        }

        /* Main sections */
        main {
            padding: 2rem;
            text-align: center; /* Center-align content within main */
        }

        .hero {
            text-align: center;
            margin-bottom: 3rem; /* Increased spacing */
        }

        .hero h1 {
            font-size: 3rem; /* Larger heading */
            margin-bottom: 1rem;
            color: #333333; /* Darkened color */
        }

        .hero p {
            font-size: 1.2rem;
            color: #666666;
            margin-bottom: 2rem;
        }

  

        .services {
            text-align: center; /* Center-align text */
            margin-top: 2rem;
            margin-bottom: 2rem; /* Adjusted margin for space */
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .services h2 {
            margin-bottom: 2rem; /* Increased spacing */
            color: #333333; /* Darkened color */
        }

        .service {
            text-align: center;
            margin-bottom: 2rem;
            flex-basis: calc(33.33% - 2rem);
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .service img {
            max-width: 100%;
            height: 170px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .service h3 {
            margin-top: 1rem;
            color: #333333;
        }

        .service p {
            color: #666666;
        }

        .testimonial {
            text-align: center;
            margin-top: 3rem;
        }

        .testimonial .testimonial-card {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .testimonial .testimonial-card blockquote {
            font-style: italic;
            margin-bottom: 1rem;
            color: #333333; /* Darkened color */
        }

        .testimonial .testimonial-card cite {
            font-weight: bold;
            color: #4CAF50; /* Accent color */
        }

        /* Footer */
        footer {
            background-color: #333333;
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .book {
            text-align: center; /* Center-align book section */
            margin-bottom: 2rem; /* Increased spacing */
        }

        .book .btn {
            background-color: #4CAF50; /* Accent color */
            color: #ffffff;
            padding: 14px 35px; /* Increased padding */
            text-decoration: none;
            border-radius: 11px;
            transition: background-color 0.3s ease;
            border: none; /* Ensure no border */
            font-size: 1.2rem; /* Increased font size */
            font-weight: bold; /* Bold font weight */
            cursor: pointer; /* Hand cursor on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added box-shadow */
        }

        .book .btn:hover {
            background-color: #45a049; /* Darkened accent color on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Enhanced shadow on hover */
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="Images/hotel.png" alt="Hotel Logo">
    </div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="auth-buttons">
        <a href="./in/index.php" class="btn">Sign In</a>
        <a href="./in/register.php" class="btn">Sign Up</a>
    </div>
</header>

<main>
    <section class="hero">
        <h1>Welcome to Our Hotel</h1>
        <p>Experience luxury and comfort like never before.</p>
    </section>

    <section class="services">
        <h2>Services</h2>
        
        <div class="service">
            <img src="Images/1.jpg" alt="Spa & Wellness">
            <h3>Spa & Wellness</h3>
            <p>Relax and rejuvenate in our spa.</p>
        </div>
        <div class="service">
            <img src="Images/2.jpg" alt="Restaurant & Bar">
            <h3>Restaurant & Bar</h3>
            <p>Enjoy delicious meals and cocktails.</p>
        </div>

        <div class="service">
            <img src="Images/2.jpg" alt="Pool & Recreation">
            <h3>Pool & Recreation</h3>
            <p>Swim and have fun in our pools.</p>
        </div>
    </section>

    <section class="testimonial">
        <h2>What Our Guests Say</h2>
        <div class="testimonial-card">
            <img src="https://via.placeholder.com/100" alt="Guest 1">
            <blockquote>"Excellent service and beautiful rooms. Highly recommended!"</blockquote>
            <cite>John Doe</cite>
        </div>
        <div class="testimonial-card">
            <img src="https://via.placeholder.com/100" alt="Guest 2">
            <blockquote>"Great location and amazing amenities. Will visit again!"</blockquote>
            <cite>Jane Smith</cite>
        </div>
    </section>
</main>


</body>
</html>
