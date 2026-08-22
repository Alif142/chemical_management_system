<?php

require_once "../includes/auth_check.php";
require_once "../includes/header.php";
require_once "../includes/navbar.php";

?>

<h1>Dashboard</h1>

<p>
    Welcome,
    <?php echo $_SESSION["name"]; ?>
</p>

<hr>

<h3>System Information</h3>

<p>
    User ID:
    <?php echo $_SESSION["user_id"]; ?>
</p>

<p>
    Email:
    <?php echo $_SESSION["email"]; ?>
</p>

<p>
    Role ID:
    <?php echo $_SESSION["role_id"]; ?>
</p>

<?php

require_once "../includes/footer.php";

?>
