<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM ticket_types WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_type = $_POST['ticket_type'];
    $price = $_POST['price'];
    $query = "UPDATE ticket_types SET ticket_type='$ticket_type', price='$price' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: manage-type-ticket.php");
    }
}
?>
<form method="POST">
    <label>Ticket Type:</label>
    <input type="text" name="ticket_type" value="<?php echo $row['ticket_type']; ?>" required>
    <label>Price:</label>
    <input type="number" name="price" value="<?php echo $row['price']; ?>" step="0.01" required>
    <button type="submit">Update</button>
</form>
