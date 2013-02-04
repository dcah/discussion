<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 print "test1<br />";
 
 
  $postTimestamp ='2012-05-09 11:33:37';
 
 
 print $postTimestamp . "<br />";
 
  print "Posted " . time_elapsed_string($postTimestamp) . " ago<br />";
  
  
   

 
 
 	function time_elapsed_string($ptime) {
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
 
 
 print "test2<br />"; 
 
?>
