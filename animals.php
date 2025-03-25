<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "zoo_management";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch animals from the database
$sql = "SELECT * FROM animals";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Management System - Animal Detail</title>
    <style>
        /* General Styles */
/* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f8f9fa;
    color: #333;
}

/* Header */
header {
    background-color: #2c3e50;
    color: white;
    padding: 15px 0;
    text-align: center;
    position: sticky;
    top: 0;
    z-index: 1000;
}

header h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

nav {
    display: flex;
    justify-content: center;
    gap: 20px;
}

nav a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    transition: background 0.3s;
}

nav a:hover,
nav a.active {
    background: #e74c3c;
}

/* Banner */
.banner {
    background: url('/image/banner.jpg') no-repeat center center/cover;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
    font-size: 28px;
}

/* Animal Container */
.animal-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 40px 20px;
}

.animal-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    text-align: center;
    width: 250px;
    transition: transform 0.3s ease-in-out;
}

.animal-card:hover {
    transform: scale(1.05);
}

.animal-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 3px solid #e74c3c;
}

.animal-name {
    font-size: 18px;
    padding: 10px;
    font-weight: bold;
    background: #e74c3c;
    color: white;
}

/* Footer */
footer {
    background: #2c3e50;
    color: white;
    padding: 20px 0;
    text-align: center;
    margin-top: 40px;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 900px;
    margin: auto;
}

.footer-section h3 {
    margin-bottom: 10px;
}

.footer-section p,
.footer-section a {
    color: #ccc;
    font-size: 14px;
    text-decoration: none;
    margin-bottom: 5px;
}

.footer-section a:hover {
    color: white;
}

.footer-bottom {
    margin-top: 15px;
    font-size: 14px;
}

/* Responsive Design */
@media (max-width: 768px) {
    nav {
        flex-wrap: wrap;
        gap: 10px;
    }

    .animal-container {
        flex-direction: column;
        align-items: center;
    }

    .animal-card {
        width: 90%;
    }

    .footer-container {
        flex-direction: column;
        text-align: center;
    }
}

        </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Zoo Management System</h1>
        <nav>
            <a href="login.php">Login</a>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="animals.php" class="active">Animals</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>

    <!-- Banner -->
    <div class="banner">
        <h2>Animal Detail</h2>
    </div>

    <!-- Animal Grid -->
    <div class="animal-container">
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="animal-card">
                    <a href="animal_details.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                        <?php 
                            $imagePath = 'uploads/' . htmlspecialchars($row['image']);
                            
                            // Check if the image exists, if not, use a default image
                            if (!file_exists($imagePath) || empty($row['image'])) {
                                $imagePath = 'image/default.jpg'; // Set default image
                            }
                        ?>
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" onerror="this.src='image/default.jpg';">
                    </a>
                    <div class="animal-name"><?php echo htmlspecialchars($row['name']); ?></div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="no-data">No animals found in the database.</p>
        <?php } ?>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Details</h3>
                <p><a href="about.php">About Us</a></p>
                <p><a href="contact.php">Contact</a></p>
                <p><a href="admin.php">Admin</a></p>
            </div>
            <div class="footer-section">
            <h1>Contact Us</h1>
<p>Email: <a href="mailto:contact@zoomanagement.com">contact@zoomanagement.com</a></p>
<p>Phone: +91 98765 43210</p>
<p>Location: National Zoological Park, Mathura Road, New Delhi, India - 110003</p>
<p>Operating Hours: Monday - Sunday, 9:00 AM - 5:00 PM</p>

            </div>
            <div class="footer-section">
                <h3>Social</h3>
                <p><a href="#">Facebook</a></p>
                <p><a href="#">Twitter</a></p>
                <p><a href="#">Google+</a></p>
                <p><a href="#">Vimeo</a></p>
            </div>
        </div>
        <p class="footer-bottom">© 2025 Zoo Management System</p>
    </footer>

</body>
</html>
