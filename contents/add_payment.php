<?php
	if (isset($_POST['expense_id'])) {
		$expense_id = $_POST['id'];
		
	}
$accounts = $system->show_accounts();
?>
<h1>Add Payment</h1><hr><br>
<form action="" method="POST">
	<label>Account:</label>
	<select name="account" required>
		<?php
			foreach ($accounts as $value) {
				?>
					<option value="<?php echo $value['5'] ?>"> <?php echo strtoupper($value['1'])." ".strtoupper($value['2']) ?></option>
				<?php
			}
		?>
	</select><br><br>
	<label>Amount: </label><input type="number" name="amount" required><br><br>
	<input type="hidden" name="expense_id" value="<?php echo $expense_id;?>">
	<input type="submit" style="background-color:#a10f1c;color:white;" class="myButton" align="center" onclick="confirm('Add this Payment?')" name="submitPayment" value="ADD PAYMENT" required><br><br>
</form>
<?php
	if (isset($_POST['submitPayment'])) { 
		extract($_POST);	
		$check = $system->add_payment($account,$expense_id,$amount);
		if ($check) {
			header("Location: http://localhost/2016/expensemanager/index.php?rdf_rd=95dd1ee0abf4c20f8562fhsfhfuy898ca4c13be7ee4a355d0ec974aasdfsdfwec875c3d2ca2f7960847807e5cc80ab03058618306a");
		}
	}
?>
<?php

