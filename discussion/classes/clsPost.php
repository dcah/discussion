<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once("clsSection.php");

class Post extends Section {

	private $User;
	private $Follows;
	private $Timestamp;
	private $Content;
	private $ImagePath;

	public function setUser($User) { $this->User = $User; }
	public function getUser() { return $this->User; }
	
	public function setFollows($Follows) { $this->Follows = $Follows; }
	public function getFollows() { return $this->Follows; }

	public function setTimestamp($Timestamp) { $this->Timestamp = $Timestamp; }
	public function getTimestamp() { return $this->Timestamp; }

	public function setContent($Content) { $this->Content = $Content; }
	public function getContent() { return $this->Content; }

	public function setImagePath($ImagePath) { $this->ImagePath = $ImagePath; }
	public function getImagePath() { return $this->ImagePath; }

	public function __construct() { }
	
}
?>
