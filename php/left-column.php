<?php
$result = mysql_query('SELECT * from topicuri where status =1');
if ($result) {
?>
<ul style="list-style-type:none" class="ulmain">
<?php
}
?>

<?php
while ($row = mysql_fetch_assoc($result)) {
$id_topic=$row['id'];
?>
	<li><div class="button"><?php echo $row['titlu']; ?></div>
		
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
			<li><div class="button button1"><?php echo $row1['titlu']; ?></div>
		
				<?php 
				$result2 = mysql_query('SELECT * from subcategorii where status =1 and id_parinte='.$id_categorie.'');
				if ($result2) {
				?>
					<ul style="list-style-type:none" class="ul">
				<?php	
				}
				?>
					<?php
					while ($row2 = mysql_fetch_assoc($result2)) {
					$id_subcategorie=$row2['id'];
					?>
						<li><div class="button button2"><?php echo $row2['titlu'];?></div>
					
						<?php 
						$result3 = mysql_query('SELECT * from articole where status =1 and id_parinte='.$id_subcategorie.'');
						if ($result3) {
						?>
							<ul style="list-style-type:none" class="ul">
						<?php	
						}
						?>
							<?php
							while ($row3 = mysql_fetch_assoc($result3)) {
							?>
								<li>
									<div class="button button3"><a href="<?php echo $path;?>index.php?id=<?php echo $row3['id']; ?>" style="text-decoration:none; color:white"><?php echo $row3['titlu'];?></a></div>
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
					<?php if ($result1) {
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