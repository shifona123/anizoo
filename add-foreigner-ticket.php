<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visitor_name = $_POST['visitor_name'];
    $adult_count = $_POST['adult_count'];
    $child_count = $_POST['child_count'];

    $query = "INSERT INTO foreigner_tickets (visitor_name, adult_count, child_count) VALUES ('$visitor_name', '$adult_count', '$child_count')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Foreigner Ticket Added Successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Foreigner Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
            width: 100%;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            width: 50%;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .submit-btn {
            background: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>ZMS ADMIN</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li>
                <a href="#">Animals Details</a>
                <ul>
                    <li><a href="add-animals.php">Add Animals</a></li>
                    <li><a href="manage-animals.php">Manage Animals</a></li>
                </ul>
            </li>
            <li><a href="manage-type-ticket.php">Manage Type Ticket</a></li>
            <li>
                <a href="#">Normal Ticket</a>
                <ul>
                    <li><a href="add-normal-ticket.php">Add Ticket</a></li>
                    <li><a href="manage-normal-ticket.php">Manage Ticket</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Foreigners Ticket</a>
                <ul>
                    <li><a href="add-foreigner-ticket.php" class="active">Add Ticket</a></li>
                    <li><a href="manage-foreigner-ticket.php">Manage Ticket</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Reports</a>
                <ul>
                    <li><a href="normal-people-report.php">Normal People Reports</a></li>
                    <li><a href="foreigner-people-report.php">Foreigner People Reports</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Search</a>
                <ul>
                    <li><a href="normal-ticket-search.php">Normal Ticket Search</a></li>
                    <li><a href="foreigner-ticket-search.php">Foreigner Ticket Search</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="content">
        <h2>Add Foreigner Zoo Ticket</h2>
        <div class="form-container">
            <form action="" method="post">
                <label>Visitor Name</label>
                <input type="text" name="visitor_name" required>

                <label>Adult</label>
                <input type="number" name="adult_count" required>

                <label>Children</label>
                <input type="number" name="child_count" required>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>
