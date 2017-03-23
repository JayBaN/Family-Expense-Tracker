<h2>Add Expense</h2><hr>
<form action="" method="POST">
	<label>Description: </label><input type="text" name="description" required><br><br>
	<label>Amount: </label><input type="number" step="any" name="amount" required><br><br>
	<label>Date: </label><input type="date" name="date" required><br><br>
	<input type="submit" style="background-color:#a10f1c;color:white;" class="myButton" align="center" onclick="confirm('Add this Expense?')" name="submitExpense" value="ADD" required><br><br>
</form>
<?php
	if (isset($_POST['submitExpense'])) {
		extract($_POST);	
		$success = $system->new_expense($description,$amount,$date);
			if ($success) {
			 	echo "Added Successfully";
			} else {
				echo "FAILED";
			} 		 
	}
?>