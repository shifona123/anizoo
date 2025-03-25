<?php
include('db.php');

// Check if an ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Animal ID is missing.");
}

$id = intval($_GET['id']); // Sanitize ID

// Delete query
$query = "DELETE FROM animals WHERE id = $id";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Animal deleted successfully!'); window.location.href='manage-animals.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
