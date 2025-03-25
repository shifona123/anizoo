<?php
include('db.php');

// Check if database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Animals</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }
        .edit-btn {
            background: blue;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .delete-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>ZMS ADMIN</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="dropdown">
                <a href="#">Animals Details</a>
                <ul class="submenu">
                    <li><a href="add-animals.php">Add Animals</a></li>
                    <li><a href="manage-animals.php" class="active">Manage Animals</a></li>
                </ul>
            </li>
            <li><a href="manage-type-ticket.php">Manage Type Ticket</a></li>
            <li class="dropdown">
                <a href="#">Normal Ticket</a>
                <ul class="submenu">
                    <li><a href="add-normal-ticket.php">Add Ticket</a></li>
                    <li><a href="manage-normal-ticket.php">Manage Ticket</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Foreigners Ticket</a>
                <ul class="submenu">
                    <li><a href="add-foreigner-ticket.php">Add Ticket</a></li>
                    <li><a href="manage-foreigner-ticket.php">Manage Ticket</a></li>
                </ul>
            </li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="search.php">Search</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Manage Animals</h2>
        <table>
            <tr>
                <th>S.NO</th>
                <th>Cage Number</th>
                <th>Animal Name</th>
                <th>Creation Date</th>
                <th>Action</th>
            </tr>
            
            <?php
            $query = "SELECT * FROM animals ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            // Check if query execution is successful
            if ($result) {
                $sno = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $sno++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['cage_number']) . "</td>";
                    
                    // Use correct column name
                    if (isset($row['name'])) {
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    } else {
                        echo "<td>Unknown</td>"; // Fallback if column is missing
                    }

                    echo "<td>" . htmlspecialchars($row['creation_date']) . "</td>";
                    echo "<td>
                            <a href='edit-animal.php?id=" . htmlspecialchars($row['id']) . "' class='edit-btn'>Edit</a>
                            <a href='delete-animal.php?id=" . htmlspecialchars($row['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Error fetching data: " . mysqli_error($conn) . "</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
