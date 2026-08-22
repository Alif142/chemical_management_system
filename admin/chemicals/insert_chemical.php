<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

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
INSERT INTO chemical
(
    chemical_id,
    chemical_name,
    hazard,
    unit_price
)
VALUES
(
    '$chemical_id',
    '$chemical_name',
    '$hazard',
    '$unit_price'
)
";

try
{
    $result = mysqli_query($conn, $sql);
}
catch (mysqli_sql_exception $e)
{
    if ($e->getCode() == 1062)
    {
        die("Chemical ID already exists. Please use a different Chemical ID.");
    }
    else
    {
        die("Unable to add chemical.");
    }
}

header(
    "Location: /chemical_management_system/admin/chemicals/chemicals.php"
);

exit();

?>
