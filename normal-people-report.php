<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $sql = "INSERT INTO normal_people_reports (from_date, to_date) VALUES ('$from_date', '$to_date')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Report generated successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normal People Report</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ECF0F1;
}

.container-fluid {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #2C3E50;
    padding: 15px;
    color: white;
    height: 100vh;
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

.sidebar ul .submenu ul {
    padding-left: 15px;
}

.sidebar ul .submenu ul li a {
    font-size: 14px;
}

.sidebar ul li a.active {
    color: #FFD700;
    font-weight: bold;
}

.content {
    flex-grow: 1;
    padding: 30px;
}

.form-control {
    width: 100%;
    margin-bottom: 15px;
}

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container-fluid">
    <div class="sidebar">
        <h2>ZMS ADMIN</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="submenu">Animals Details
                <ul>
                    <li><a href="add-animals.php">Add Animals</a></li>
                    <li><a href="manage-animals.php">Manage Animals</a></li>
                </ul>
            </li>
            <li><a href="manage-type-ticket.php">Manage Type Ticket</a></li>
            <li class="submenu">Normal Ticket
                <ul>
                    <li><a href="add-normal-ticket.php">Add Ticket</a></li>
                    <li><a href="manage-normal-ticket.php">Manage Ticket</a></li>
                </ul>
            </li>
            <li class="submenu">Foreigner Ticket
                <ul>
                    <li><a href="add-foreigner-ticket.php">Add Ticket</a></li>
                    <li><a href="manage-foreigner-ticket.php">Manage Ticket</a></li>
                </ul>
            </li>
            <li class="submenu">Reports
                <ul>
                    <li><a href="normal-people-report.php" class="active">Normal People Report</a></li>
                    <li><a href="foreigner-people-report.php">Foreigner People Report</a></li>
                </ul>
            </li>
            <li class="submenu">Search
                <ul>
                    <li><a href="normal-ticket-search.php">Normal Ticket Search</a></li>
                    <li><a href="foreigner-ticket-search.php">Foreigner Ticket Search</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="content">
        <h2 class="text-primary">Between Dates Reports Of Ticket Generating</h2>
        <form method="POST">
            <label>From Date</label>
            <input type="date" name="from_date" required class="form-control">
            
            <label>To Date</label>
            <input type="date" name="to_date" required class="form-control">
            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
