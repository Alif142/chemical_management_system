<?php

require_once "../../includes/auth_check.php";
require_once "../../config/database.php";
require_once "../../includes/header.php";
require_once "../../includes/navbar.php";

if (!isset($_GET["chemical_id"]))
{
    die("Chemical ID is required.");
}

$chemical_id = trim($_GET["chemical_id"]);

$sql = "
SELECT *
FROM chemical
WHERE chemical_id = '$chemical_id'
";

$result = mysqli_query($conn, $sql);

if (!$result)
{
    die("Unable to retrieve chemical.");
}

if (mysqli_num_rows($result) == 0)
{
    die("Chemical not found.");
}

$chemical = mysqli_fetch_assoc($result);

?>

<h1>Edit Chemical</h1>

<form
    action="update_chemical.php"
    method="POST">

    <p>

        <label>
            Chemical ID
        </label>

        <br>

        <input
            type="text"
            name="chemical_id"
            value="<?php echo $chemical["chemical_id"]; ?>"
            readonly>

    </p>

    <p>

        <label>
            Chemical Name
        </label>

        <br>

        <input
            type="text"
            name="chemical_name"
            value="<?php echo $chemical["chemical_name"]; ?>"
            required>

    </p>

    <p>

        <label>
            Hazard
        </label>

        <br>

        <input
            type="text"
            name="hazard"
            value="<?php echo $chemical["hazard"]; ?>">

    </p>

    <p>

        <label>
            Unit Price
        </label>

        <br>

        <input
            type="number"
            step="0.01"
            name="unit_price"
            value="<?php echo $chemical["unit_price"]; ?>"
            required>

    </p>

    <button type="submit">
        Update Chemical
    </button>

</form>

<?php

require_once "../../includes/footer.php";

?>
