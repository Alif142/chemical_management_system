<?php

require_once "../../includes/auth_check.php";
require_once "../../includes/header.php";
require_once "../../includes/navbar.php";

?>

<h1>Add Chemical</h1>

<form
    action="insert_chemical.php"
    method="POST">

    <p>

        <label>
            Chemical ID
        </label>

        <br>

        <input
            type="text"
            name="chemical_id"
            required>

    </p>

    <p>

        <label>
            Chemical Name
        </label>

        <br>

        <input
            type="text"
            name="chemical_name"
            required>

    </p>

    <p>

        <label>
            Hazard
        </label>

        <br>

        <input
            type="text"
            name="hazard">

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
            required>

    </p>

    <button type="submit">
        Save Chemical
    </button>

</form>

<?php

require_once "../../includes/footer.php";

?>
