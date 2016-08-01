<?php
include ("db-sett/db-connect.php");
session_start();
//echo $_SESSION['userid'];
$result = mysql_query('SELECT * from users where id= '.$_SESSION['userid'].'');
$row = mysql_fetch_assoc($result);
//echo $row['user'];

if($_SESSION['userid']==''){
	header('Location: http://bluelogic.ro/mywebsite/intro.php');
	die();
}
if($_SESSION['permission'] == 1){
	header('Location: http://bluelogic.ro/mywebsite/index.php');
}


$searchprint ='';

if (isset($_POST['search'])){

	$result = mysql_query('SELECT * from articole where status=1 and titlu like "%'.$_POST['searchinput'].'%"');
	
	while($row = mysql_fetch_assoc($result)){
		//echo $row['titlu'] ;
		
		$searchprint .= '<a href='.$path.'index_admin.php?idc='.$row['id'].' style="text-decoration:none; color: white"><font size="5">'.$row['titlu'].'</font></a>
		<p><font color="blue" size="4">'.$row['intro'].'</font></p>';
		
	}
}


?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $path;?>css/style.css">
<title>WorldWide Info</title>
<link rel="icon" href="image/favicon.ico" type="image/x-icon"/>
<script src="ckeditor/ckeditor.js"></script>
<script>
/**
 * Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/* exported initSample */

if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
	CKEDITOR.tools.enableHtml5Elements( document );

// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';

var initSample = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'editor' );

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=http://ckeditor.com]CKEditor[/url].'
			);
		}

		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( 'editor' );
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'editor' );

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();

</script>
</head>
<body>
<div id="header" class="head-main">
	<div id="headleft">
	<a href="<?php echo $path?>"><img src="<?php echo $path;?>image/logo.png"></a>
	</div>
	<div id="headmid">
		<form id="searchbox" action="index_admin.php" method="post">
			<input id="search" type="text" name="searchinput" placeholder="Scrie aici">
			<input class="submit" type="submit" name="search" value="Cauta">
		</form>
	</div>
	<div id="headright">
		<div class="login">
			<li style="list-style-type:none"> Logat ca: <?php echo $_SESSION['user'];?> </li><br> 
			<?php if($_SESSION['userid']==''){ ?> 
				<a href="<?php echo $path;?>login.php"><button class="buttoncont">Autentificare</button></a>
			
				<a href="<?php echo $path;?>register.php"><button class="buttoncont">Inregistrare</button></a>
			<?php } ?>
				<a href="<?php echo $path;?>logout.php"><button class="buttoncont">Deconectare</button></a>
		</div>
	</div>
</div>
<div id="main" background="<?php echo $path;?>image/bg.png">
	<div id="colleft">
	<font color="white"><p><b>Cuprins:</b></p></font>
	<?php include("php/left-column_admin.php"); ?>
	</div>
	<div id="colright">
	<?php echo $searchprint;?>
	<br>
	<font color="white"><?php include("php/right-column_admin.php"); ?></font>
	</div>
</div>
<div id="footer">
	<div id="footleft">
		<center><font color="#A4A4A4">Site creat de Siminica Razvan</font></center>
	</div>
	<div id="footmid">
		<center><font color="#A4A4A4">Copyright &copy; WorldWide Info</font></center>
	</div>
	<div id="footright">
		<center><font color="#A4A4A4">Liceul "Voltaire" - Craiova</font></center>
	</div>
</div>
</body>
</html>