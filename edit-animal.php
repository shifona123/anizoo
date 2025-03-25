<?php
include('db.php');

// Check if an ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: Animal ID is missing.");
}

$id = intval($_GET['id']); // Sanitize ID

// Fetch existing data
$query = "SELECT * FROM animals WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Error: Animal not found.");
}

$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cage_number = mysqli_real_escape_string($conn, $_POST['cage_number']);
    $animal_name = mysqli_real_escape_string($conn, $_POST['name']);

    $update_query = "UPDATE animals SET cage_number = '$cage_number', name = '$animal_name' WHERE id = $id";
    
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Animal updated successfully!'); window.location.href='manage-animals.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Animal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #27ae60;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
        }
        .btn:hover {
            background: #218c53;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Animal</h2>
    <form method="POST">
        <label for="cage_number">Cage Number</label>
        <input type="text" name="cage_number" value="<?php echo htmlspecialchars($row['cage_number']); ?>" required>

        <label for="name">Animal Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

        <button type="submit" class="btn">Update Animal</button>
    </form>
</div>

</body>
</html>
