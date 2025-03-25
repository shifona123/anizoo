<?php
include('db.php');

// Insert Ticket Type
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_type = $_POST['ticket_type'];
    $price = $_POST['price'];

    if (!empty($ticket_type) && !empty($price)) {
        $query = "INSERT INTO ticket_types (ticket_type, price) VALUES ('$ticket_type', '$price')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Ticket Type Added Successfully');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('All fields are required');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Type Ticket</title>
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
        form {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 5px;
        }
        input, button {
            padding: 10px;
            width: 100%;
            margin-top: 10px;
        }
        button {
            background: green;
            color: white;
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
            <li><a href="manage-animals.php">Manage Animals</a></li>
            <li><a href="manage-type-ticket.php" class="active">Manage Type Ticket</a></li>
            <li><a href="manage-normal-ticket.php">Manage Normal Ticket</a></li>
            <li><a href="manage-foreigner-ticket.php">Manage Foreigner Ticket</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="search.php">Search</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Manage Type Ticket</h2>

        <!-- Add Ticket Type Form -->
        <form method="POST">
            <label>Ticket Type:</label>
            <input type="text" name="ticket_type" required>
            <label>Price:</label>
            <input type="number" name="price" step="0.01" required>
            <button type="submit">Add Ticket Type</button>
        </form>

        <!-- Display Ticket Types -->
        <table>
            <tr>
                <th>S.NO</th>
                <th>Ticket Type</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            
            <?php
            $query = "SELECT * FROM ticket_types ORDER BY id DESC";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $sno = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $sno++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['ticket_type']) . "</td>";
                    echo "<td>$ " . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>
                            <a href='edit-type-ticket.php?id=" . htmlspecialchars($row['id']) . "' class='edit-btn'>Edit</a>
                            <a href='delete-type-ticket.php?id=" . htmlspecialchars($row['id']) . "' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Error fetching data: " . mysqli_error($conn) . "</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
