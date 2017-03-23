<?php
	$show = $system->show_expense();
	$accounts = $system->show_accounts();
	$total_account = $system->count_account();


	if ($total_account > 0) {
		$th = $total_account + 5;
	} else {
		$th = 5;
	} 
	
?>
<h2>Expense Manager</h2>
<a href="index.php?rdf_rd=95dd1ee0abf4c20f8562fhsfhfuy8IUB34B5IUB435IUBFEWRUIWBEIUB343BNIUBGBDD89998EDSDBIBIUB8618306a" 
	<button class="myButton">Add New Expense</button>
</a>
<hr>

<table cellspacing="5" class="table-style-two">
	<tr>
		<th colspan="<?php print $th; ?>">BILLING SUMMARY</th>
	</tr>
	<tr>
		<th>#</th>
		<th>Description</th>
		<th>Date</th>
		<th>Amount</th>
		<th></th>
		<?php 
		if ($accounts) {
		$number = 1;
			foreach ($accounts as $row) {
				?>
					<th style="background-color:green;color:white;"><?php print $row['1']." ".($row['2'])." (".$number.") "; ?></th>
				<?php
			$number++;
			}
		}
		?>
	</tr>
	
	<?php 

	if ($show) {
	$row_number = 1;
	$total_amount_paid = 0;
	$amount_set = 0;

	$setDate;
	$previousDate = "none";
		foreach ($show as $row) {
		$setDate = date("F", strtotime($row['3']))." ".date("Y", strtotime($row['3']));
		if ($setDate != $previousDate) {
			$row_number = 1;
			if ($amount_set != 0)  {
				?>
					<tr>
						<td colspan="3"><b>TOTAL BILL:</b></td>
						<td colspan="2"><?php print "<b> AED ".number_format($amount_set,2)."</b>"; ?></td>

						<!-- -PAID AMOUNT -->
						<td colspan="<?php print $total_account; ?>"><b>TOTAL PAID:</b></td>
						<td colspan="2"><?php print "<b> AED ".number_format($total_amount_paid,2)."</b>"; ?></td>
					</tr>
					<tr>
						<td colspan="5"> </td>
						<?php 
							$row_balance = $total_account + 1; 
							$total_balance = $amount_set - $total_amount_paid;
						?>
						<td colspan="<?php print $total_account;?>"> <b>BALANCE: </b></td>
						<td><b><?php print "AED ".number_format($total_balance,2); ?></b></td>
					</tr>
				<?php
				$amount_set = 0;
				$total_amount_paid = 0;
			}
			?>
				<tr>
					<td style="background-color:grey;color:white;font-size:15px;" colspan="<?php print $th; ?>"><?php echo $setDate;?></td>
				</tr>
				<tr>
					<td><?php echo $row_number;?></td>
					<td><?php print strtoupper($row['2']); ?></td>
					<td><?php print $newDate = date("F j, Y", strtotime($row['3'])); ?></td>
					<td><?php print "AED ".number_format($row['1'],2); ?></td>
					<td>
						<!-- PAYMENT -->
						<form method="POST" action="index.php?rdf_rd=95dd1ee0abf4c20f8ASD979BG7D9F8AH2K3JNJKNS09123NKLNGS90JH02NNniunbs78g3n98HB3IBIUB8618306a">
							<input type="hidden" name="id" value="<?php echo $row['5']?>">
							<button type="submit" name="expense_id" >PAYMENT</button>
						</form>
						<!-- END PAYMENT -->
					</td>
					<?php
					$show_payment = $system->paid_bills($row['5']);
					$total_payment_made = 0;
					foreach ($show_payment as $row2) {
						$total_payment_made = $row2['1'] + $total_payment_made;
						if ($row2['1'] > 0) {
							?>
								<td style="color:green;"> <b> <?php print "AED ".number_format($row2['1'],2); ?> </b> </td>
							<?php
						} else {
							?>
								<td style="color:red;"> <b> <?php print "AED 0"; ?> </b> </td>
							<?php
						}
						$total_amount_paid = $row2['1'] + $total_amount_paid;
					}
					?>
					<td> <b>= <?php print "AED ".number_format($total_payment_made,2); ?></b> </td>
				</tr>
			<?php

		} else {
			?>
				<tr>
					<td><?php echo $row_number;?></td>
					<td><?php print strtoupper($row['2']); ?></td>
					<td><?php print $newDate = date("F j, Y", strtotime($row['3'])); ?></td>
					<td><?php print "AED ".number_format($row['1'],2); ?></td>
					<td>
						<!-- PAYMENT -->
						<form method="POST" action="index.php?rdf_rd=95dd1ee0abf4c20f8ASD979BG7D9F8AH2K3JNJKNS09123NKLNGS90JH02NNniunbs78g3n98HB3IBIUB8618306a">
							<input type="hidden" name="id" value="<?php echo $row['5']?>">
							<button type="submit" name="expense_id" >PAYMENT</button>
						</form>
						<!-- END PAYMENT -->
					</td>
					<?php
					$show_payment = $system->paid_bills($row['5']);
					$total_payment_made = 0;
					foreach ($show_payment as $row2) {
						$total_payment_made = $row2['1'] + $total_payment_made;
						if ($row2['1'] > 0) {
							?>
								<td style="color:green;"> <b> <?php print "AED ".number_format($row2['1'],2); ?> </b> </td>
							<?php
						} else {
							?>
								<td style="color:red;"> <b> <?php print "AED 0"; ?> </b> </td>
							<?php
						}
						$total_amount_paid = $row2['1'] + $total_amount_paid;
					}
					?>
					<td> <b>= <?php print "AED ".number_format($total_payment_made,2); ?></b> </td>
				</tr>
			<?php
		}
			
			$row_number++;
			$previousDate = date("F", strtotime($row['3']))." ".date("Y", strtotime($row['3']));
			$amount_set = $row['1'] + $amount_set;
		}
		?>
			<tr style="font-size:12px;">
				<td colspan="3"><b>TOTAL BILL:</b></td>
				<td colspan="2"><?php print "<b> AED ".number_format($amount_set,2)."</b>"; ?></td>

				<!-- -PAID AMOUNT -->
				<td colspan="<?php print $total_account; ?>"><b>TOTAL PAID:</b></td>
				<td colspan="2"><?php print "<b> AED ".number_format($total_amount_paid,2)."</b>"; ?></td>
			</tr>
			<tr>
				<td colspan="5"> </td>
					<?php 
						$row_balance = $total_account + 1; 
						$total_balance = $amount_set - $total_amount_paid;
					?>
				<td colspan="<?php print $total_account;?>"><b>BALANCE: </b></td>
				<td><b><?php print "AED ".number_format($total_balance,2); ?></b></td>
			</tr>
		<?php

	} else {
		?>
				<tr>
					<td colspan="4" align="center" style="color:red;">NO DATA AVAILABLE</td>
				</tr>
			<?php
	}
	?>
</table>


