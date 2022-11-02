<?php include('db_connect.php');?>

<div class="container-fluid">

    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>List of Tenant</b>
                        =
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"><strong>t_id</strong></th>
                                    <th class="text-center"><strong>t_firstname</strong></th>
                                    <th class="text-center"><strong>t_lastname</strong></th>
                                    <th class="text-center"><strong>t_email</strong></th>
                                    <th class="text-center"><strong>t_phonenumber</strong></th>
                                    <th class="text-center"><strong>t_image</strong></th>
                                    <th class="text-center"><strong>t_dob</strong></th>
                                    <th class="text-center"><strong>t_gender</strong></th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								include 'db_connect.php';
								//get users living in the landlords properties
								$getuserquery = "SELECT u_id FROM bookings WHERE ld_id = '".$_SESSION['ld_id']."'";
								$getuserresult = mysqli_query($conn, $getuserquery);
								if(mysqli_num_rows($getuserresult) == 0) {
									echo "No users found";
								} else {
									while($row = mysqli_fetch_assoc($getuserresult)) {
										$u_id = $row['u_id'];
										//get user details




								$tenant = $conn->query("SELECT * FROM users WHERE u_id = $u_id");
								while($row = mysqli_fetch_assoc($tenant)){
							?>
                                < <tr>
                                    <td align="center"><?php echo $row["u_id"]; ?></td>
                                    <td align="center"><?php echo $row["u_firstname"]; ?></td>
                                    <td align="center"><?php echo $row["u_lastname"]; ?></td>
                                    <td align="center"><?php echo $row["u_email"]; ?></td>
                                    <td align="center"><?php echo $row["u_phonenumber"]; ?></td>
                                    <td align="center"><?php echo $row["u_image"]; ?></td>
                                    <td align="center"><?php echo $row["u_dob"]; ?></td>
                                    <td align="center"><?php echo $row["u_gender"]; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary view_payment" type="button"
                                            data-id="<?php echo $row['u_id'] ?>">View</button>
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    <?php
									}
								}
									?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>

</div>
<style>
td {
    vertical-align: middle !important;
}

td p {
    margin: unset
}

img {
    max-width: 100px;
    max-height: 150px;
}
</style>
<script>
$(document).ready(function() {
    $('table').dataTable()
})

$('#new_tenant').click(function() {
    uni_modal("New Tenant", "manage_tenant.php", "mid-large")

})

$('.view_payment').click(function() {
    uni_modal("Tenants Payments", "view_payment.php?id=" + $(this).attr('data-id'), "large")

})
$('.edit_tenant').click(function() {
    uni_modal("Manage Tenant Details", "manage_tenant.php?id=" + $(this).attr('data-id'), "mid-large")

})
$('.delete_tenant').click(function() {
    _conf("Are you sure to delete this Tenant?", "delete_tenant", [$(this).attr('data-id')])
})

function delete_tenant($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_tenant',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully deleted", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)

            }
        }
    })
}
</script>