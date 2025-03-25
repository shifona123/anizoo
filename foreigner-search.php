<?php
include 'db.php'; // Database connection

$searchResult = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];
    
    $sql = "SELECT ticket_id, visitor_name, visit_date FROM foreigner_tickets WHERE ticket_id LIKE '%$search_query%' OR visitor_name LIKE '%$search_query%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResult[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreigner Ticket Search</title>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

/* Sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    background-color: #212529;
    color: white;
    padding-top: 20px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    padding: 15px 20px;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
}

.sidebar ul li:hover {
    background-color: #343a40;
}

/* Submenu */
.submenu ul {
    display: none;
    padding-left: 15px;
}

.submenu:hover ul {
    display: block;
}

/* Content */
.content {
    margin-left: 260px;
    padding: 20px;
}

h2 {
    font-size: 22px;
    margin-bottom: 20px;
}

.form-control {
    width: 50%;
    padding: 10px;
    font-size: 16px;
    margin-top: 10px;
}

.btn-primary {
    padding: 10px 15px;
    font-size: 16px;
}

/* Table */
.table {
    width: 80%;
    margin-top: 20px;
    background-color: white;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ddd;
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
                    <li><a href="normal-people-reports.php">Normal People Reports</a></li>
                    <li><a href="foreigner-people-reports.php">Foreigner People Reports</a></li>
                </ul>
            </li>
            <li class="submenu">Search
                <ul>
                    <li><a href="normal-ticket-search.php">Normal Ticket Search</a></li>
                    <li><a href="foreigner-search.php" class="active">Foreigner Ticket Search</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="content">
        <h2>Search by Ticket ID / Visitor Name</h2>
        <form method="POST">
            <input type="text" name="search_query" placeholder="Ticket ID or Visitor Name" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </form>

        <?php if (!empty($searchResult)) { ?>
            <h3 class="mt-4">Search Results</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Visitor Name</th>
                        <th>Visit Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($searchResult as $row) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['ticket_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['visitor_name']); ?></td>
                            <td><?php echo isset($row['visit_date']) ? htmlspecialchars($row['visit_date']) : 'N/A'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <p class="mt-3 text-danger">No results found.</p>
        <?php } ?>
    </div>
</div>
</body>
</html>
