<?php
include ("db-sett/db-connect.php");

session_start();
$message = '';
if (isset($_POST['loginsubmit'])){

	$result = mysql_query('SELECT * from users where user= "'.$_POST['user'].'" and password="'.$_POST['password'].'" ' )  or die ('Unable to run query:'.mysql_error());;

	$row = mysql_fetch_assoc($result);
	
	if(mysql_num_rows($result) > 0){
		$_SESSION['user']=$row['user'];
		$_SESSION['password']=$row['password'];
		$_SESSION['userid']=$row['id'];
		$_SESSION['permission']=$row['permission'];
		
		
		header('Location: http://bluelogic.ro/mywebsite/');
		
	 
	}
	else{
		$message =  '<br><center><div class="boxeroare"><font color="red">Utilizator/Parola gresita!</font></div></center>';
	}

}	
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/style.css">
<title>WorldWide Info - Conectare</title>
<link rel="icon" href="image/favicon.ico" type="image/x-icon"/>
</head>
<body>
	<div class='lgformholder'>
		<div class='inner'>
			<form name="login" method="POST" action="#">
				<header>Login</header>
				<?php echo $message; ?>
				<label>Username <span>*</span></label>
				<input type="text" name="user" placeholder="Username"/>
				<label>Parola <span>*</span></label>
				<input type="password" name="password" placeholder="Parola"/>
				
				<button type="submit" name="loginsubmit">Login</button>
				<div class="help">Nu ai un cont? <a href="<?php echo $path;?>register.php" style="color:red; text-decoration:none;">Inregistreaza-te!</a></div>
			</form>
		</div>
	</div>
</body>
</html>