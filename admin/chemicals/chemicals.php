<?php

require_once "../../includes/auth_check.php";
require_once "../../config/database.php";
require_once "../../includes/header.php";
require_once "../../includes/navbar.php";

$sql = "
SELECT *
FROM chemical
ORDER BY chemical_name
";

$result = mysqli_query($conn, $sql);

?>

<h1>Chemical Management</h1>

<p>

    <a href="add_chemical.php">
        Add New Chemical
    </a>

</p>

<table border="1">

    <tr>

        <th>Chemical ID</th>
        <th>Chemical Name</th>
        <th>Hazard</th>
        <th>Unit Price</th>
        <th>Action</th>

    </tr>

    <?php

    while ($chemical = mysqli_fetch_assoc($result)) {

    ?>

        <tr>

            <td>
                <?php echo $chemical["chemical_id"]; ?>
            </td>

            <td>
                <?php echo $chemical["chemical_name"]; ?>
            </td>

            <td>
                <?php echo $chemical["hazard"]; ?>
            </td>

            <td>
                <?php echo $chemical["unit_price"]; ?>
            </td>

            <td>

                <a
                    href="edit_chemical.php?chemical_id=<?php echo $chemical["chemical_id"]; ?>">
                    Edit
                </a>

                <a
                    href="delete_chemical.php?chemical_id=<?php echo $chemical["chemical_id"]; ?>">
                    Delete
                </a>

            </td>
        </tr>

    <?php

    }

    ?>

</table>

<?php

require_once "../../includes/footer.php";

?>
