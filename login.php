<?php
session_start()
?>
<!DOCTYPE html
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="view port"content="width=device-width,initial-scale=1.0">
        <title>Login</title>
        <style>
            body{
                background-image:url('uploads/loginbackground.jpg');
                background-size:cover;
                background-position:center;
                font-family:Arial,Sansserif;
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
                margin:0;
            }
            .form-container{
                background-color:rgba(255,255,0.8);
                padding:20px;
                border-radius:10px;
                width:300px;
                box-shadow:0 4px 8px rgba(0,0,0,0.1);
            }
            h2{
                text-align:center;
                margin-bottom:5px;
            }
            label{
                font-size:14px;
                margin-bottom:20px;
                display:block;
            }
            input[type="text"],input[type="email"],input[type="password"]{
                width:100%;
                padding:10px;
                margin-bottom:15px;
                border:1px solid #ddd;
                border-radius:5px;
                font-size:14px;
            }
            input[type="submit"]{
                width:100%;
                padding:10px;
                background-color:#4CAF50;
                color:white;
                border:none;
                border-radius:10px;
                font-size:16px;
                cursor:pointer;
            }
            input[type="submit"]:hover{
                background-color:#4CAF50;
            }
            .error{
                color:red;
                font-size:12px;
                text-align:center;
            }
        </style>
        </head>
        <body>
            <div class="forms-container">
                <h2>Login</h2>
            <form action="index.php"method="POST">
                <label for="username">Username:</label>
            <input type ="text"id="username"name="username"required><br>
            <label for="email">Email:</label>
            <input type="email"id="email"required><br>
            <label for="password">Password:</label>
            <input type="password"id="password"required><br>
            <input type="submit"value="Login"a href="index.php"></a>
        </form>
        </div>
        </body>
        </html>

