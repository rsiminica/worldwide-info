<?php
if (isset($_GET['id'])){
	$result = mysql_query('SELECT * from articole where status =1 and id='.$_GET['id'].'');
	$row1 = mysql_fetch_assoc($result);

if ($result) {
?>
<h3><?php echo $row1['titlu']; ?></h3>
<p><?php echo $row1['continut']; ?></p>
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
<h3><?php echo $row1['titlu']; ?></h3>
<p><?php echo $row1['continut']; ?></p>
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