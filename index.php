<?php
include 'db.php';

// Fetch all animal records securely
$query = "SELECT * FROM animal";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Management System</title>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Header */
header {
    background: white;
    padding: 15px 0;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.header-container h1 {
    font-family: 'Georgia', serif;
    font-size: 2rem;
    font-weight: bold;
    text-transform: uppercase;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    font-size: 1rem;
    color: #666;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a.active,
nav ul li a:hover {
    color: #ff7f00;
}

/* Banner Section */
.banner {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
}

.banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.5);
    padding: 20px;
    color: white;
    text-align: center;
    border-radius: 5px;
}

.banner-text h2 {
    font-size: 2rem;
    margin: 0;
}

.banner-text p {
    font-size: 1.2rem;
}

/* Info Section */
.info {
    display: flex;
    justify-content: space-around;
    margin: 50px auto;
    max-width: 1200px;
}

.info-box {
    width: 45%;
    padding: 20px;
    background: #eee;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.info-box h3 {
    color: #ff7f00;
}

/* Animal Cards Section */
.animals {
    text-align: center;
    margin: 50px auto;
}

.animal-cards {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: auto;
}

.card {
    width: 250px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card h3 {
    background: #ff7f00;
    color: white;
    padding: 10px;
    margin: 0;
}

.card p {
    padding: 10px;
    font-size: 0.9rem;
    color: #444;
}

/* Footer */
footer {
    background: #222;
    color: white;
    padding: 30px 0;
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    max-width: 1000px;
    margin: auto;
}

.footer-section h1 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.footer-section p {
    font-size: 0.9rem;
}

.footer-section a {
    text-decoration: none;
    color: #ff7f00;
}

.footer-section a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .info {
        flex-direction: column;
        align-items: center;
    }

    .info-box {
        width: 90%;
        margin-bottom: 20px;
    }

    .animal-cards {
        flex-direction: column;
        align-items: center;
    }

    .footer-content {
        flex-direction: column;
        text-align: center;
    }
}

        </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-container">
            <h1>Zoo Management System</h1>
            <nav>
                <ul>
                <li><a href="login.php">Login</a></li>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="animals.php">Animals</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Banner Section -->
    <section class="banner">
        <img src="uploads/banner.jpg" alt="Tiger Banner">
        <div class="banner-text">
            <h2>Visit the Zoo</h2>
            <p>Zoos provide an opportunity to see wild animals. They are places of learning and entertainment.</p>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info">
        <div class="info-box">
            <h3>PLAN YOUR VISIT</h3>
            <p>
                A whole world of wonder awaits at our Zoo! With over 27,000 animals from 500 species, 
                there's so much to see and do. Plan your adventure in advance and get ready for a full day of fun!
            </p>
        </div>
        <div class="info-box">
            <h3>DEVELOPMENTS AT THE ZOO</h3>
            <p>
                We're always building at the zoo, and there are many exciting developments on the horizon. 
                Keep up to date with all the new plans for the zoo, along with any associated animal moves and 
                temporary changes to animal locations.
            </p>
        </div>
    </section>

    <!-- Animal Cards -->
    <section class="animals">
        <h2>Welcome to Zoo Planet</h2>
        <div class="animal-cards">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <img src="<?php echo !empty($row['image_url']) ? $row['image_url'] : 'image/default-animal.jpg'; ?>" 
                         alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h1>Details</h1>
                <li><a href="login.php">Login</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin.php">Admin</a></li>
            </div>
            <div class="footer-section">
            <h1>Contact Us</h1>
<p>Email: <a href="mailto:contact@zoomanagement.com">contact@zoomanagement.com</a></p>
<p>Phone: +91 98765 43210</p>
<p>Location: National Zoological Park, Mathura Road, New Delhi, India - 110003</p>
<p>Operating Hours: Monday - Sunday, 9:00 AM - 5:00 PM</p>

            </div>
            <div class="footer-section">
                <h1>Social</h1>
                <p><a href="https://facebook.com" target="_blank">Facebook</a></p>
                <p><a href="https://twitter.com" target="_blank">Twitter</a></p>
                <p><a href="https://plus.google.com" target="_blank">Google+</a></p>
                <p><a href="https://vimeo.com" target="_blank">Vimeo</a></p>
            </div>
        </div>
        <p>&copy; 2025 Zoo Management System</p>
    </footer>

</body>
</html>
