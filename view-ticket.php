<?php
include 'db.php';

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    // Fetch ticket details
    $sql = "SELECT * FROM normal_ticket WHERE id = $ticket_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
    } else {
        echo "<script>alert('Ticket not found!'); window.location.href='manage-normal-ticket.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='manage-normal-ticket.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #ECF0F1;
}

.container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}
</style>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Ticket Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>Ticket ID</th>
            <td><?php echo $ticket['ticket_id']; ?></td>
        </tr>
        <tr>
            <th>Visitor Name</th>
            <td><?php echo $ticket['visitor_name']; ?></td>
        </tr>
        <tr>
            <th>Generating Ticket Date</th>
            <td><?php echo $ticket['generating_ticket_date']; ?></td>
        </tr>
    </table>
    <a href="manage-normal-ticket.php" class="btn btn-secondary">Back</a>
</div>


</body>
</html>
