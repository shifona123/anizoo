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

// Get animal ID from URL safely
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    die("Invalid animal ID.");
}

// Use prepared statement to fetch animal details
$sql = "SELECT * FROM animal WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Animal not found!");
}

$animal = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($animal['name']); ?> - Animal Details</title>
    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Body */
        body {
            background-color: #f5f5f5;
            color: #333;
        }

        /* Header */
        header {
            background: #2c3e50;
            color: white;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin-bottom: 10px;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            padding: 10px 15px;
            transition: 0.3s;
        }

        nav a:hover,
        nav a.active {
            background: #16a085;
            border-radius: 5px;
        }

        /* Animal Detail Container */
        .animal-detail-container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .animal-detail-container h2 {
            color: #16a085;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .animal-detail-container img {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.3s;
        }

        .animal-detail-container img:hover {
            transform: scale(1.05);
        }

        .animal-detail-container p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Back Button */
        .back-button {
            text-decoration: none;
            background: #16a085;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
            font-weight: 600;
        }

        .back-button:hover {
            background: #138d75;
        }

        /* Footer */
        footer {
            text-align: center;
            background: #2c3e50;
            color: white;
            padding: 15px 0;
            margin-top: 40px;
        }

        .footer-bottom {
            font-size: 14px;
            margin-top: 10px;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Zoo Management System</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="animals.php" class="active">Animals</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>

    <!-- Animal Detail -->
    <div class="animal-detail-container">
        <h2><?php echo htmlspecialchars($animal['name']); ?></h2>
        <img src="uploads/<?php echo htmlspecialchars($animal['detail_image']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
        
        <p><strong>Breed Name:</strong> <?php echo htmlspecialchars($animal['breed_name']); ?></p>
        <p><strong>Cage Number:</strong> <?php echo htmlspecialchars($animal['cage_number']); ?></p>
        <p><strong>Feed Number:</strong> <?php echo htmlspecialchars($animal['feed_number']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($animal['description'])); ?></p>

        <a href="animals.php" class="back-button">Back to Animals</a>
    </div>

    <!-- Footer -->
    <footer>
        <p class="footer-bottom">© 2025 Zoo Management System</p>
    </footer>

</body>
</html>
