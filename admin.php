<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // MD5 encryption for security

    $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Zoo Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f6f9;
        }
        .login-container {
            width: 350px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .login-header {
            background: #805dca;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
        }
        .btn-submit {
            background: #805dca;
            color: white;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">ZOO MANAGEMENT SYSTEM</div>
        <div class="p-3">
            <?php if (isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
