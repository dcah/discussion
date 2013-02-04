<?php
//Created on Feb 2, 2013

 
 class ListTopics {
	public function getAllTopicsArray($conn) {
		require_once("clsTopic.php");
		
		$sql = "SELECT * FROM topic ORDER BY topicID";
		$e = mysql_query($sql, $conn);
		$sectionArr = array();
		$i = 0;
		
		while ($rs = mysql_fetch_array($e)) {
			$sectionArr[$i] = new Topic();
			$sectionArr[$i]->setID($rs['topicID']);			
			$sectionArr[$i]->setName($rs['topicName']);
			$sectionArr[$i]->setDescription($rs['topicDescription']);
			$i++;
		}
		
		return $sectionArr;
		
	}		
}
 
 
 
 
?>
