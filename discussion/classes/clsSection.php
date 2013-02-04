<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
class Section {

	private $ID;
	private $Name;
	private $Description;
	private $Rank;
	
	public function setID($ID) { $this->ID = $ID; }
	public function getID() { return $this->ID; }
	
	public function setName($Name) { $this->Name = $Name; }
	public function getName() { return $this->Name; }
	
	public function setDescription($Description) { $this->Description = $Description; }
	public function getDescription() { return $this->Description; }

	public function setRank($Rank) { $this->Rank = $Rank; }
	public function getRank() { return $this->Rank; }
	
	public function __construct() { }

 	public function time_elapsed_string($ptime) {
    	$etime = time() - strtotime($ptime);
    
    	if ($etime < 1) {
        	return '0 seconds';
    	}
    
    	$a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
        	        30 * 24 * 60 * 60       =>  'month',
            	    24 * 60 * 60            =>  'day',
                	60 * 60                 =>  'hour',
                	60                      =>  'minute',
                	1                       =>  'second'
                	);
    
    	foreach ($a as $secs => $str) {
        	$d = $etime / $secs;
        	if ($d >= 1) {
            	$r = round($d);
            	return $r . ' ' . $str . ($r > 1 ? 's' : '');
        	}
    	}
	}


}
?>
