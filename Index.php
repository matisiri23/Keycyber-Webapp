<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha384-r8LvRGQyJtMWN8vUFLnnF5O8G/jD8K/esG/En5M/JwN85UF3dBm7lXu6D8ecc8M" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .login-box {
            margin-top: 100px;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }

        .form-group input:focus {
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        .form-group button {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-group button:hover {
            background-color: #0062cc;
        }
    </style>
</head>
<body>
<h1 class=" p-3 text-center text-white" style="background-color: #32a6a8"><b class="fw-bold">KeyCyber </b>Project Management</h1>
<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="login-box">
                <h2>Login</h2>
                <form action="/HomePage.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <footer style="height: 70px;background-color: #32a6a8" class=" fixed-bottom ">
                    <div class="container text-center">
                        <p class="text-white p-3" >Copyright © 2024 KeyCyber. All rights reserved.</p>
                    </div>
                </footer>