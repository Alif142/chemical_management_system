<?php

session_start();

if (!isset($_SESSION["user_id"]))
{
    header("Location: /chemical_management_system/auth/login.php");
    exit();
}

?>
