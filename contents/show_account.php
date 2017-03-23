<table cellspacing="5" class="table-style-two">
	<tr>
		<th>#</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Age</th>
		<th>Occupation</th>
	</tr>
	<?php 
	$show = $system->show_accounts();
	$row_number = 1;
	if ($show) {
		foreach ($show as $row) {
			?>
				<tr>
					<td><?php echo $row_number;?></td>
					<td><?php print $row['1']; ?></td>
					<td><?php print $row['2']; ?></td>
					<td><?php print $row['3']; ?></td>
					<td><?php print $row['4']; ?></td>
				</tr>
			<?php
			$row_number++;
		}
	} else {
		?>
			<tr> 
				<td style="color:red;text-align:center;" colspan="5"><b>NO DATA AVAILABLE</b></td>
			</tr>
		<?php 
	}

	
?>
</table>