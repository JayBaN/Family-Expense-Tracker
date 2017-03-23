<?php

	class Database {

		public $db;
		
		public function __construct(){

			$this->open();
		}
		public function open() {

			$host = "localhost";
			$user = "root";
			$pass = "";
			$dbase = "db_expense_manager";

			global $db;

			$db = new mysqli($host,$user,$pass,$dbase);
			if ( !$db ) {

				echo "ERROR: Could not connect to database";		
				exit;

			} else {
				//print "connected";
			}
		}
	}
	$dbase = new Database();
?>