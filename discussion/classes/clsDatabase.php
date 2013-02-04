<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
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
