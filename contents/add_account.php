<form action="" method="POST">
	<h2>Register Account:</h2>
	<label>First name: </label><input type="text" name="first_name" required><br><br>
	<label>Last name: </label><input type="text" name="last_name" required><br><br>
	<label>Age: </label><input type="number" name="age" required><br><br>
	<label>Occupation: </label><input type="text" name="occupation" required><br><br>
	<input type="submit" style="background-color:#a10f1c;color:white;" class="myButton" align="center" onclick="confirm('Add this Account?')" name="submit" value="ADD ACCOUNT" required><br><br>
</form>
<?php
	if (isset($_POST['submit'])) {
		extract($_POST);	
		$success = $system->new_account($first_name,$last_name,$age,$occupation);
			if ($success) {
			 	echo "Account Registered";
			} else {
				echo "FAILED";
			} 		 
	}
?>
