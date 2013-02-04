<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once("clsTopic.php");

class Thread extends Topic {

	private $ThreadTopicID;
	
	public function setThreadTopicID($ThreadTopicID) { $this->ThreadTopicID = $ThreadTopicID; }
	public function getThreadTopicID() { return $this->ThreadTopicID; }

	public function __construct() { }

}
?>
