<?php

require_once "../../includes/auth_check.php";
require_once "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
    die("Invalid Request");
}

$chemical_id = trim($_POST["chemical_id"]);
$chemical_name = trim($_POST["chemical_name"]);
$hazard = trim($_POST["hazard"]);
$unit_price = trim($_POST["unit_price"]);

if (
    empty($chemical_id)
    ||
    empty($chemical_name)
    ||
    empty($unit_price)
)
{
    die("Required fields are missing.");
}

$sql = "
UPDATE chemical
SET
    chemical_name = '$chemical_name',
    hazard = '$hazard',
    unit_price = '$unit_price'
WHERE chemical_id = '$chemical_id'
";

try
{
    $result = mysqli_query($conn, $sql);
}
catch (mysqli_sql_exception $e)
{
    die("Unable to update chemical.");
}

header(
    "Location: /chemical_management_system/admin/chemicals/chemicals.php"
);

exit();

?>
