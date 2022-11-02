<?php 

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New
                user</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <table class="table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>ld_id</strong></th>
                            <th class="text-center"><strong>ld_firstname</strong></th>
                            <th class="text-center"><strong>ld_lastname</strong></th>
                            <th class="text-center"><strong>ld_email</strong></th>
                            <th class="text-center"><strong>ld_phonenumber</strong></th>
                            <th class="text-center"><strong>ld_image</strong></th>
                            <th class="text-center"><strong>ld_dob</strong></th>
                            <th class="text-center"><strong>ld_bankaccountno</strong></th>
                            <th class="text-center"><strong>ld_password</strong></th>
                            <th class="text-center"><strong>ld_address</strong></th>
                            <th class="text-center"><strong>ld_gender</strong></th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM landlords WHERE  ld_id = '".$_SESSION['ld_id']."'");
 					while($row = mysqli_fetch_assoc($users)):
				 ?>
                        <tr>
                            <td align="center"><?php echo $row["ld_id"]; ?></td>
                            <td align="center"><?php echo $row["ld_firstname"]; ?></td>
                            <td align="center"><?php echo $row["ld_lastname"]; ?></td>
                            <td align="center"><?php echo $row["ld_email"]; ?></td>
                            <td align="center"><?php echo $row["ld_phonenumber"]; ?></td>
                            <td align="center"><?php echo $row["ld_image"]; ?></td>
                            <td align="center"><?php echo $row["ld_dob"]; ?></td>
                            <td align="center"><?php echo $row["ld_bankaccountno"]; ?></td>
                            <td align="center"><?php //echo $row["ld_password"]; ?></td>
                            <td align="center"><?php echo $row["ld_address"]; ?></td>
                            <td align="center"><?php echo $row["ld_gender"]; ?></td>
                            <td>
                                <center>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button type="button"
                                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item edit_user" href="javascript:void(0)"
                                                data-id='<?php echo $row['ld_id'] ?>'>Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_user" href="javascript:void(0)"
                                                data-id='<?php echo $row['ld_id'] ?>'>Delete</a>
                                        </div>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
$('table').dataTable();
$('#new_user').click(function() {
    uni_modal('New User', 'manage_user.php')
})
$('.edit_user').click(function() {
    uni_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'))
})
$('.delete_user').click(function() {
    _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
})

function delete_user($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_user',
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