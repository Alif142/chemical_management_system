<?php

require_once "../../includes/auth_check.php";
require_once "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] != "GET")
{
    die("Invalid Request");
}


if (!isset($_GET["chemical_id"]))
{
    die("Chemical ID is required.");
}

$chemical_id = trim($_GET["chemical_id"]);

$sql = "
DELETE 
FROM chemical
WHERE chemical_id = '$chemical_id'
";
mysqli_query($conn, $sql);
header(
    "Location: /chemical_management_system/admin/chemicals/chemicals.php"
);
exit()
?>
