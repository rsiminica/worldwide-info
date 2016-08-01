<?php
$result = mysql_query('SELECT * from topicuri where status =1');
if ($result) {
?>
<ul style="list-style-type:none" class="ulmain">
<?php
}

if (isset($_POST['butoncategorie'])){
	$resultpost = mysql_query('INSERT INTO `categorii` (`titlu`, `status`,`id_parinte`) VALUES ("'.$_POST['titlucateg'].'", "1","'.$_POST['idparinte'].'")');
	header('Location: http://bluelogic.ro/mywebsite/index_admin.php');
}

if (isset($_POST['butonsubcategorie'])){
	$resultpost1 = mysql_query('INSERT INTO `subcategorii` (`titlu`, `status`,`id_parinte`) VALUES ("'.$_POST['titlusubcateg'].'", "1","'.$_POST['idparinte1'].'")');
	header('Location: http://bluelogic.ro/mywebsite/index_admin.php');
}
if (isset($_POST['butonarticol'])){
	$resultpost2 = mysql_query('INSERT INTO `articole` (`titlu`, `status`,`id_parinte`) VALUES ("'.$_POST['titluart'].'", "1", "'.$_POST['idparinte2'].'")');
	header('Location: http://bluelogic.ro/mywebsite/index_admin.php');
}

while ($row = mysql_fetch_assoc($result)) {
$id_topic=$row['id'];
?>
	<li><div class="button"><?php echo $row['titlu']; ?></div>  <form name="adaugacategorie" action="#" method="post" class="formadd"><input name="butoncategorie" type="submit" class="formaddbtn" src="<?php echo $path;?>image/plus.png"> <input name="titlucateg" class="formaddtext" type="text"/><input type="hidden" name="idparinte" value=<?php echo $id_topic ?>></form><br>
		
		<?php 
		$result1 = mysql_query('SELECT * from categorii where status =1 and id_parinte='.$id_topic.'');
		if ($result1) {
		?>
			<ul style="list-style-type:none" class="ul">
		<?php	
		}
		?>
			<?php
			while ($row1 = mysql_fetch_assoc($result1)) {
			$id_categorie=$row1['id'];
			?>
			<li><div class="button button1"><?php echo $row1['titlu']; ?></div> <form name="adaugasubcategorie" action="#" method="post" class="formadd"><input name="butonsubcategorie" type="submit" class="formaddbtn" src="<?php echo $path;?>image/plus.png"/> <input name="titlusubcateg" class="formaddtext" type="text"/><input type="hidden" name="idparinte1" value=<?php echo $id_categorie ?>></form><br>
		
				<?php 
				$result2 = mysql_query('SELECT * from subcategorii where status =1 and id_parinte='.$id_categorie.'');
				if ($result2) {
				?>
					<ul style="list-style-type:none" class="ul">
				<?php	
				}
				?>
					<?php
					while ($row1 = mysql_fetch_assoc($result2)) {
					$id_subcategorie=$row1['id'];
					?>
						<li><div class="button button2"><?php echo $row1['titlu'];?></div>  <form name="adaugaarticol" action="#" method="post" class="formadd"><input name="butonarticol" type="submit" class="formaddbtn" src="<?php echo $path;?>image/plus.png"/> <input name="titluart" class="formaddtext" type="text"/><input type="hidden" name="idparinte2" value=<?php echo $id_subcategorie ?>></form><br>
					
						<?php 
						$result3 = mysql_query('SELECT * from articole where status =1 and id_parinte='.$id_subcategorie.'');
						if ($result3) {
						?>
							<ul style="list-style-type:none" class="ul">
						<?php	
						}
						?>
							<?php
							while ($row1 = mysql_fetch_assoc($result3)) {
							?>
								<li>
									<div class="button button3"><a href="<?php echo $path;?>index_admin.php?id=<?php echo $row1['id']; ?>" style="text-decoration:none; color:white"><?php echo $row1['titlu'];?></a></div><br>
								</li>
							
							
							<?php
							} 
							?>
							<?php if ($result2) {
							?>
							</ul>
							<?php	
							}
							?>
					
						</li>
					
					
					<?php
					} 
					?>
					<?php if ($result3) {
					?>
					</ul>
					<?php	
					}
					?>
			</li>
						
			
	</li>
			
			
			<?php
			} 
			?>
			<?php if ($result1) {
			?>
				</ul>
			<?php	
			}
			?>
	</li>
<?php
} 
?>
<?php
if ($result) {
?>
</ul>
<?php
}
?>