<?php
require 'includes/connect.php';

$query = "SELECT * FROM landlords";
$run = mysqli_query($conn, $query);
?>
<!--<div class="table-responsive" style="width: 100%;
border: solid 1px red;
">-->
<div style="text-align:center;">
    <form action="insertlandlord.php" method="post">
        <button class="btn btn-success" name="add_landlord">
            Add landlord
        </button>
    </form>
</div>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phonenumber</th>
            <th scope="col">Image</th>
            <th scope="col">Gender</th>
            <th scope="col">Date of birth</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_array($run)) {
                $id = $row['ld_id'];
        ?>
        <tr>
            <th scope="row"><?php echo $row['ld_id']; ?></th>
            <td><?php echo $row['ld_firstname'] . " " . $row['ld_lastname']; ?></td>
            <td><?php echo $row['ld_phonenumber']; ?></td>
            <td><?php echo "image goes here"; ?></td>
            <td><?php echo $row['ld_gender']; ?></td>
            <td><?php echo $row['ld_dob']; ?></td>
            <td>
                <button class="btn btn-primary" name="edit_landlord"><a href="editlandlord.php?id=
                        <?php echo $id; ?>">Edit</a></button>
            </td>
            <td>
                <button class="btn btn-primary" name="view_landlord"><a href="viewlandlord.php?id=
                        <?php echo $id; ?>">View</a></button>
            </td>
            <td>
                <button class="btn btn-danger" name="delete_landlord"><a href="deletelandlord.php?id=
                        <?php echo $id; ?>">Delete</a></button>
            </td>
        </tr>
        <?php
            }
        }

        ?>
    </tbody>
</table>
<!--</div>-->