<?php 
include('db_connect.php');
session_start();
$Id_id = $_SESSION['ld_id'];
if(isset($_GET['ld_id'])){
$user = $conn->query("SELECT * FROM landlords where ld_id =".$_GET['ld_id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-user">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">First Name</label>
			<input type="text" name="lb_firstname" id="lb_firstname" class="form-control" value="<?php echo isset($meta['lb_firstname']) ? $meta['lb_firstname']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Second Name</label>
			<input type="text" name="lb_secondname" id="nlb_secondnameame" class="form-control" value="<?php echo isset($meta['lb_secondname']) ? $meta['lb_firstname']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<input type="text" name="lb_email" id="lb_email" class="form-control" value="<?php echo isset($meta['lb_email']) ? $meta['lb_email']: '' ?>" required  autocomplete="on">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="lb_password" id="lb_password" class="form-control" value="" autocomplete="off">
			<?php if(isset($meta['lb_id'])): ?>
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		<?php endif; ?>
		</div>
		<?php if(isset($meta['type']) && $meta['type'] == 3): ?>
			<input type="hidden" name="type" value="3">
		<?php else: ?>
		<?php if(!isset($_GET['mtype'])): ?>
		<?php endif; ?>
		<?php endif; ?>
		

	</form>
</div>