<?php
require_once '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Login - Chemical Management System
    </title>

</head>

<body>

    <h1>
        Login
    </h1>

    <form action="/chemical_management_system/auth/login_process.php" method="POST">

        <div>

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                required>

        </div>

        <br>

        <div>

            <label for="password">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                required>

        </div>

        <br>

        <button type="submit">
            Login
        </button>

    </form>

    <br>

    <a href="/chemical_management_system/index.php">
        Back to Home
    </a>

</body>

</html>
