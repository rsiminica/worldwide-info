<?php
	if (isset($_POST['buttonsubmit'])){
		$result = mysql_query('UPDATE `articole` SET `titlu` = "'.$_POST['titlu'].'", `continut` = "'.$_POST['contentval'].'" WHERE `articole`.`id` = '.$_POST['idarticol'].';');
		
		//echo 'UPDATE `articole` SET `titlu` = "'.$_POST['titlu'].'", `continut` = "'.$_POST['contentval'].'" WHERE `articole`.`id` = '.$_POST['idarticol'].';';
		
	//echo $_POST['idarticol'];
	}


if (isset($_GET['id'])){
	$result = mysql_query('SELECT * from articole where status =1 and id='.$_GET['id'].'');
	$row1 = mysql_fetch_assoc($result);

if ($result) {
?>
<h3>

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


	
	
	
<form name="edit" method="post" action="#">	
	<input name="titlu" value="<?php echo $row1['titlu']; ?>"/>
	<input type="hidden" name="idarticol" value='<?php echo $row1['id']; ?>'/>
	<textarea  id="editor" type="hidden" name="contentval" value=''><?php echo $row1['continut']; ?></textarea>
	<input type="submit" name="buttonsubmit" value='sbmt'/>
</form>
<?php
}else{
?>
	
<?php
}
	
}
else if (isset($_GET['idc'])){
	$result = mysql_query('SELECT * from articole where status =1 and id='.$_GET['idc'].'');
	$row1 = mysql_fetch_assoc($result);

if ($result) {
?>
<input name="titlu" value="<?php echo $row1['titlu']; ?>"/>

	
	
	
<form name="edit" method="post" action="#">	
	<input name="titlu" value="<?php echo $row1['titlu']; ?>"/>
	<input type="hidden" name="idarticol" value='<?php echo $row1['id']; ?>'/>
	<textarea  id="editor" type="hidden" name="contentval" value=''><?php echo $row1['continut']; ?></textarea>
	<input type="submit" name="buttonsubmit" value='sbmt'/>
</form>
<?php
}else{
?>
	
<?php
}
	
}
else if ($searchprint == ''){
?>
<img src="<?php echo $path;?>image/banner.jpg">
<h2>Ce este WorldWide Info?</h2>
<p> WorldWide Info este un site cu informatii de cultura generala, ce va poate ajuta in multe circumstante.</p>
<h2>Cu ce ma poate ajuta acest site?</h2>
<p>Pe acest site puteti accesa usor informatiile dorite, avand si un format prietenos, pentru a va usura invatatul.</p>
<h2>Din ce domenii sunt informatiile furnizate?</h2>
<p>Informatiile furnizate sunt legate de geografie, biologie si istorie.</p>
<h2>De ce sunt nevoit sa imi creez un cont pentru a vedea continutul site-ului?</h2>
<p>Detinerea unui cont este necesara pentru ca noi sa avem o evidenta a persoanelor ce ne viziteaza site-ul.</p> 
<?php
}
?>

<script>
	initSample();
</script>