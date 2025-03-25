<?php
include('db.php'); // Database connection

if (isset($_POST['submit'])) {
    // Retrieve input values from form
    $animal_name = mysqli_real_escape_string($conn, $_POST['animal_name']);
    $cage_number = mysqli_real_escape_string($conn, $_POST['cage_number']);
    $feed_number = mysqli_real_escape_string($conn, $_POST['feed_number']);
    $breed = mysqli_real_escape_string($conn, $_POST['breed']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle Image Upload
    if (isset($_FILES['animal_image']) && $_FILES['animal_image']['error'] == 0) {
        $image_name = $_FILES['animal_image']['name'];
        $image_tmp = $_FILES['animal_image']['tmp_name'];
        $image_folder = "uploads/" . basename($image_name);

        if (move_uploaded_file($image_tmp, $image_folder)) {
            // SQL Query to insert data into database
            $query = "INSERT INTO animals (`name`, `image`, `cage_number`, `feed_number`, `breed`, `description`) 
            VALUES ('$animal_name', '$image_folder', '$cage_number', '$feed_number', '$breed', '$description')";
  
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Animal added successfully!'); window.location.href='manage-animals.php';</script>";
            } else {
                echo "Database Error: " . mysqli_error($conn);
            }
        } else {
            echo "File upload failed!";
        }
    } else {
        echo "No image uploaded!";
    }
} else {
    echo "Invalid Request!";
}
?>
