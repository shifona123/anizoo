<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM ticket_types WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: manage-type-ticket.php");
}
?>
