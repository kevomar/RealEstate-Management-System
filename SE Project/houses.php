<?php include('db_connect.php');
?>

<div class="container-fluid">

    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
                <form action="" id="manage-house">
                    <div class="card">
                        <div class="card-header">
                            House Form
                        </div>
                        <div class="card-body">
                            <div class="form-group" id="msg"></div>
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label class="control-label">Property Id</label>
                                <input type="text" class="form-control" name="house_no" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Property Name</label>
                                <select name="category_id" id="" class="custom-select" required>
                                    <?php 
									$categories = $conn->query("SELECT * FROM property ");
									if($categories->num_rows > 0):
									while($row= $categories->fetch_assoc()) :
									?>
                                    <option value="<?php echo $row['ld_id']; ?>"><?php echo $row['pr_name']; ?></option>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <option selected="" value="" disabled="">Please check the category list.</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="4" class="form-control"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="number" class="form-control text-right" name="price" step="any"
                                    required="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                    <button class="btn btn-sm btn-default col-sm-3" type="reset"> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>House List</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">pr_id</th>
                                    <th class="text-center">pr_name</th>
                                    <th class="text-center">pr_description</th>
                                    <th class="text-center">pr_price</th>
                                    <th class="text-center">pr_type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								$i = 1;
								$house = $conn->query("SELECT * FROM property ");
								while($row=$house->fetch_assoc()){
								?>
                                <tr>
                                    <td class="text-center"><?php echo $row['pr_id']; ?></td>
                                    <td class="text-center"><?php echo $row['pr_name']; ?></td>
                                    <td class="text-center"><?php echo $row['pr_description']; ?></td>
                                    <td class="text-center"><?php echo $row['pr_price']; ?></td>
                                    <td class="text-center"><?php echo $row['pr_type']; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit_house" type="button"
                                            data-id="<?php echo $row['pr_id']; ?>"
                                            data-house-no="<?php echo $row['pr_id']; ?>"
                                            data-description="<?php echo $row['pr_description']; ?>"
                                            data-price="<?php echo $row['pr_price']; ?>">Edit</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger delete_house" type="button"
                                            data-id="<?php echo $row['pr_id']; ?>">Delete</button>
                                    </td>
                                </tr>
                                <?php } ?>
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
    margin: unset;
    padding: unset;
    line-height: 1em;
}
</style>
<script>
$('#manage-house').on('reset', function(e) {
    $('#msg').html('')
})
$('#manage-house').submit(function(e) {
    e.preventDefault()
    start_load()
    $('#msg').html('')
    $.ajax({
        url: 'ajax.php?action=save_house',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully saved", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)

            } else if (resp == 2) {
                $('#msg').html('<div class="alert alert-danger">House number already exist.</div>')
                end_load()
            }
        }
    })
})
$('.edit_house').click(function() {
    start_load()
    var cat = $('#manage-house')
    cat.get(0).reset()
    cat.find("[name='id']").val($(this).attr('data-id'))
    cat.find("[name='house_no']").val($(this).attr('data-house_no'))
    cat.find("[name='description']").val($(this).attr('data-description'))
    cat.find("[name='price']").val($(this).attr('data-price'))
    cat.find("[name='category_id']").val($(this).attr('data-category_id'))
    end_load()
})
$('.delete_house').click(function() {
    _conf("Are you sure to delete this house?", "delete_house", [$(this).attr('data-id')])
})

function delete_house($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_house',
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
$('table').dataTable()
</script>