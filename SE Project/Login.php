<!DOCTYPE html>
<html lang="en">
<?php 
session_start();

include('./db_connect.php');

if ( ! empty( $_POST ) ) {
	if(isset($_POST['submit']) && isset( $_POST['ld_password'] )){

		$ld_password = $_POST['ld_password'];
		$ld_email = $_POST['ld_email'];
	 
		$stmt =$conn ->prepare( " SELECT * FROM landlords WHERE ld_email = ? && ld_password = ? ");
		$stmt->bind_param('ss',$_POST['ld_email'], $_POST['ld_password']);
		$stmt->execute();
		
		$result = $stmt->get_result();
    	$user = $result->fetch_object();
		$_SESSION['ld_id'] = $user->ld_id;
			header('location:index.php');
			var_dump($ld_password);
	}
		else{
			$error[] = 'Incorrect email or password!';
		}
		
	
	 };
    

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
 	
</head>
<style>
	*{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

h3{
    text-transform: uppercase;
    letter-spacing: 20 px;
}
a{
    text-decoration: none;
}

.container{
    display: flex;
    justify-content: center;
    background: #e3e3e3;
    align-items: center;
    min-height: 100vh;
}

.card{
    display: flex;
    justify-content: center;
    background: #e3e3e3;
    align-items: center;
    min-height: 350px;
    width: 600px;
    flex-direction: column; 
    gap: 35px;
    border-radius: 15px;
    box-shadow: 16px 16px 32px #fefefe,
        -16px -16px 32px #fefefe;
}

.line{
    width: 100px;
    height: 3px;
    background: #fff;
} 

.inputbox{
    position: relative;
    width: 250px;
}
.inputbox input{
    width: 300px;
    padding: 10px;
    outline: none;
    border: none;
    color: black;
    font-size: 1em;
    background: transparent;
    border-left: 2px solid #000;
    border-bottom: 2px solid #000;
    transition: 0.3s;
}

.inputbox span{
    margin-top: 5px;
    position: absolute;
    left: 0;
    transform: translateY(-4px);
    margin-left: 10px;
    padding: 10px;
    pointer-events: none;
    font-size: 12px;
    color: #000;
    text-transform: uppercase; 
    transition: 0.5s;
    letter-spacing: 3px;
}

.inputbox input:valid~span,
.inputbox input:focus~span{
    transform: translateX(213px) translateY(-15px);
    font-size: 0.8px;
    padding: 5px 18px;
    background: #000;
    letter-spacing: 0.2em;
    color: #fff;
    border: 2px;
}

.inputbox input:valid,
.inputbox input:focus{
    border: 2px solid #000;
}

.container .btn{
    width: 100px;
    padding: 15px;
    left: 5px;
    border: 2px solid #000;
    border-radius: 5px;
    cursor: pointer;
    font-size: 10px;
    background-color: transparent;
    text-transform: uppercase;
    letter-spacing: 2px;
    box-shadow:0 0;
    transition: 0.5s;
}
.container .btn:hover{
    background-color: #000;
    transform: translate(-10px -10px);
    color: #fff;
    box-shadow:15px 15px #000;
}


</style>

<body>


<div class="container">
        <div class="card">
            <h3>Sign Up</h3>
            <form action="" method="post">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
        
            <br>
            <div class="inputbox">
                <input type="text" name="ld_email" Id="ld_email" required="required">
                <span>Email</span>
            </div>
            <br><br>
            <div class="inputbox">
                <input type="password" name="ld_password" Id="ld_password" required="required">
                <span>Password</span>
            </div>
            <br><br>
            <div>
            <button type="submit" name="submit"class="btn">Login</button>
            </div>
            <br><br>
            <div>
                <p>Don't have an account? <a href="reg.php">Register now</a></p>
            </div>
            </form>
        </div>
    </div>



</body>
	
</html>