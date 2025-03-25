<?php 
include('db.php'); // Ensure db.php exists and is correct
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
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

    /* Active Menu Item */
    .sidebar ul li a.active {
        background: #1abc9c;
        padding: 8px;
        border-radius: 5px;
    }

    .sidebar ul .dropdown ul {
        display: none;
        list-style: none;
        padding-left: 15px;
    }

    .sidebar ul .dropdown:hover ul {
        display: block;
    }

    .content {
        margin-left: 270px;
        padding: 20px;
        width: 100%;
    }

    form {
        background: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 600px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        background: #2980b9;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>ZMS ADMIN</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="dropdown">
                <a href="animals_details.php">Animals Details</a>
                <ul class="submenu">
                    <li><a href="add-animals.php" class="active">Add Animals</a></li>
                    <li><a href="manage-animals.php">Manage Animals</a></li>
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
        <h2>Add Animal Detail</h2>
        <form action="add_animal_process.php" method="POST" enctype="multipart/form-data">
            <label>Animal Name</label>
            <input type="text" name="animal_name" required>

            <label>Animal Image</label>
            <input type="file" name="animal_image" accept="image/*" required>

            <label>Cage Number</label>
            <input type="text" name="cage_number" required>

            <label>Feed Number</label>
            <input type="text" name="feed_number" required>

            <label>Breed</label>
            <input type="text" name="breed" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
