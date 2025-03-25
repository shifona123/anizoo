<?php
include 'db.php';

// Securely delete ticket if requested
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM normal_tickets WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        echo "<script>alert('Ticket deleted successfully!'); window.location.href='manage-normal-ticket.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}

// Fetch tickets from the database
$sql = "SELECT * FROM normal_tickets ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Normal Tickets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #34495E;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a.active {
            background-color: #1ABC9C;
        }

        .sidebar ul .submenu ul {
            padding-left: 20px;
        }

        .sidebar ul .submenu ul li {
            padding: 5px 10px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ECF0F1;
        }

        .table {
            background: white;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- Sidebar -->
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
                    <li><a href="manage-normal-ticket.php" class="active">Manage Ticket</a></li>
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
                    <li><a href="normal-people-reports.php">Normal People Reports</a></li>
                    <li><a href="foreigner-people-reports.php">Foreigner People Reports</a></li>
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

    <!-- Content -->
    <div class="content">
        <h2>Manage Normal Tickets</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Ticket ID</th>
                    <th>Visitor Name</th>
                    <th>Generating Ticket Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$sn}</td>
                        <td>{$row['ticket_id']}</td>
                        <td>{$row['visitor_name']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='view-ticket.php?id={$row['id']}' class='btn btn-primary'>View</a>
                            <a href='manage-normal-ticket.php?delete_id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                    $sn++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
