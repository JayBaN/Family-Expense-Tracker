<?php
	class System {
		public $db;
		public function __construct() {

			global $db;

			$this->db  = $db;
		}
		public function new_account($first_name,$last_name,$age,$occupation) {
			$checkSql = "SELECT * FROM tbl_account WHERE first_name = '$first_name' AND last_name = '$last_name' AND age = '$age' AND occupation = '$occupation'";
			$data = mysqli_query($this->db,$checkSql);
			$count_row = $data->num_rows;
			if ($count_row > 0) {
				?>
					<script>
						alert('You have a account that has the same information as you have registered.');
					</script>
				<?php
				return false;
			} else {
				$sql = "INSERT INTO tbl_account (first_name,last_name,age,occupation)
					VALUES
					('$first_name','$last_name',$age,'$occupation')";
				$result = mysqli_query($this->db,$sql) or die ("Error in adding account.");
				if ($result) {
					return true;
				} else {
					return false;
				}
			} 
		}

		public function show_accounts() {
			$sql = "SELECT * FROM tbl_account";
			$result = mysqli_query($this->db,$sql);
			$count = $result->num_rows;

			if ($count > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
					$files[]=array('1'=>$first_name,'2'=>$last_name,'3'=>$age,'4'=>$occupation,'5'=>$account_id);
				}
				return $files;
			} else {
				return false;
			}
			
		}

		public function new_expense($description,$amount,$date) {
			$sql = "INSERT INTO tbl_expense (amount,description,date_registered,time_registered)
				VALUES
			('$amount','$description','$date',NOW())";
				
			$result = mysqli_query($this->db,$sql) or die ("Error in adding expense.");
				if ($result) {
					$latest_expense = $this->latest_expense_added();
					$accounts = $this->show_accounts();
					foreach ($accounts as $row) {
						$account_id = $row['5'];
						$sql = "INSERT INTO tbl_payment (account_id,expense_id,amount)
							VALUES
						($account_id,'$latest_expense',0)";
						$result = mysqli_query($this->db,$sql) or die ("Error in adding new expense.");

					}
					return true;
				} else {
					return false;
				}
		}

		public function latest_expense_added() {
			$sql = "SELECT MAX(expense_id) as max from tbl_expense";		
			$result = mysqli_query($this->db,$sql) or die ("Error in checking max expense.");
			$count = $result->num_rows;
			if ($count > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
				$max_number = $max;
				return $max_number;
				}
			} else {
				return false;
			}
		}

		

		public function show_expense() {
			$sql = "SELECT * FROM tbl_expense ORDER BY date_registered DESC";
			$result = mysqli_query($this->db,$sql);
			$count = $result->num_rows;
			if ($count > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
					$files[]=array('1'=>$amount,'2'=>$description,'3'=>$date_registered,'4'=>$time_registered,'5'=>$expense_id);
				}
				return $files;
			} else {
				return false;
			}
			
		}
		public function count_account() {
			$sql = "SELECT * FROM tbl_account";
			$result = mysqli_query($this->db,$sql);
			$count = $result->num_rows;
			return $count;
			
		}

		public function add_payment($account,$expense_id,$amount) {
			$previous_amount = $this->check_payment_update($expense_id);
			$new_amount = $previous_amount + $amount;
			$sql = "UPDATE tbl_payment SET amount = '$new_amount' WHERE account_id = '$account' AND expense_id = '$expense_id'";
			$result = mysqli_query($this->db,$sql) or die ("Error in adding payment.");
			if ($result) {
				return true;
			} else {
				return false;
			}
		}

		public function check_payment_update($expense_id) {
			$sql = "SELECT * FROM tbl_payment WHERE expense_id = '$expense_id'";		
			$result = mysqli_query($this->db,$sql) or die ("Error in checking payment update.");
			$count = $result->num_rows;
			if ($count > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
				$previous_amount = $amount;
				return $previous_amount;
				}
			} else {
				return false;
			}
		}

		public function paid_bills($expense_id) {
			$sql = "SELECT * FROM tbl_payment WHERE expense_id = '$expense_id'";
			$result = mysqli_query($this->db,$sql) or die ("Error in checking paid bills.");
			$count = $result->num_rows;
			if ($count > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				extract($row);
					$files[]=array('1'=>$amount);
				}
				return $files;
			} else {
				return false;
			}
		}

		  

	}
?>