<?php
include ("db-sett/db-connect.php");
if(isset($_POST['reg'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordr = $_POST['passwordr'];
	$displayname = $_POST['displayname'];
	
	$message='';
	$userver = mysql_query('SELECT * from users WHERE user = "'.$username.'"');

	if(mysql_num_rows($userver) > 0){
		$message .= 'Username-ul exista deja'.'</br>';
	}
	else if($username == '')
	{
		$message .= 'Username-ul trebuie completat'.'</br>';
	}else if ($password == '')
	{
		$message .= 'Parola nu este completata.'.'</br>';
	}else if ($passwordr == '')
	{
		$message .= 'Parola trebuie confirmata.'.'</br>';
	}else  if($displayname == '')
	{
		$message .= 'Numele afisat trebuie completat.'.'</br>';
	}else if ($password != $passwordr){
		$message .= 'Parolele nu coincid.'.'</br>';
	}else
	{

		$result = mysql_query('INSERT INTO users (user,password,display_name,permission)
		VALUES ("'.$username.'","'.$password.'","'.$displayname.'",1)');

		$userdet = mysql_query('SELECT * from users order by id desc limit 1');
		$row = mysql_fetch_assoc($userdet);

		session_start();
			
		$_SESSION["username"] = $row['username'];
		$_SESSION["displayname"] = $row['display_name'];
		$_SESSION["userid"] = $row['id'];

		//echo $_SESSION["userid"];
		header('Location: http://bluelogic.ro/mywebsite/logout.php');
	
	}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/style.css">
<title>WorldWide Info - Inregistrare</title>
<link rel="icon" href="image/favicon.ico" type="image/x-icon"/>
</head>
<body>
	<div class='lgformholder'>
		<div class='inner'>
			<form name="register" method="post" action="#">
				<header>Inregistrare</header>
				<br><center><font color="red"><div class="boxeroare"><?php echo $message?></div></font></center>
				<label>Username <span>*</span></label>
				<input name="username" type="text"/>
				<div class="help">Minim 6 caractere</div>
				<label>Parola <span>*</span></label>
				<input name="password" type="password"/>
				<div class="help">Trebuie sa contina litere mari si mici</div>
				<label>Repeta Parola <span>*</span></label>
				<input name="passwordr" type="password"/>
				<label>Nume Afisare<span>*</span></label>
				<input name="displayname" type="text"/>
				<button type='submit' name='reg'>Inregistrare</button>
				<div class="help">Deja ai un cont? <a href="<?php echo $path;?>login.php" style="color:red; text-decoration:none;">Conecteaza-te!</a></div>
			</form>
		</div>
	</div>
</body>
</html>