<?php

session_start();

require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
    die("Invalid Request");
}

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

if (empty($email) || empty($password))
{
    die("Email and Password are required.");
}

$sql = "
SELECT *
FROM user
WHERE email = '$email'
";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0)
{
    die("User not found.");
}

$user = mysqli_fetch_assoc($result);

if ($password != $user["password"])
{
    die("Incorrect Password.");
}

$_SESSION["user_id"] = $user["user_id"];
$_SESSION["role_id"] = $user["role_id"];
$_SESSION["name"] = $user["name"];
$_SESSION["email"] = $user["email"];

header("Location: ../admin/dashboard.php");
exit();

?>
