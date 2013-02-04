<?php
/*
 * Created: 2 February 2013
 * Author: Dan Hillman (dhillman@bu.edu)
 * 
 */
 
 class Database {
 	private $dbCon;
 	
 	public function getDbConn() { return $this->dbConn; }
 	
 	public function __construct() {
		$this->dbConn = @mysql_connect("localhost", "root", "") or die("Couldn't connect to the MySQL server.");
 		mysql_select_db("discussion", $this->dbConn) or die("Couldn't connect to the discussionx database.");
 	}
 }
?>
