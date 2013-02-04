<?php
//Created on Feb 2, 2013

 
 class ListThreads {
	public function getAllThreadsArray($conn, $threadTopicID) {
		require_once("clsThread.php");
		require_once("clsTopic.php");
		
		//$sql = "SELECT * FROM thread ORDER BY threadID";
		
		//$sql = "SELECT * FROM thread WHERE threadTopicID = " . $threadTopicID . " ORDER BY threadID";
		
		$sql = "SELECT * FROM topic, thread WHERE threadTopicID = " . $threadTopicID . " AND threadTopicID=topicID ORDER BY threadID DESC";
		
		
		
		$e = mysql_query($sql, $conn);
		$outputArr = array();
		$i = 0;
		
		while ($rs = mysql_fetch_array($e)) {
			// Make the fist item a topic (and the first thread)
			if ($i == 0) {		
				$outputArr[$i] = new Topic();			
				$outputArr[$i]->setName($rs['topicName']);
				$outputArr[$i]->setDescription($rs['topicDescription']);
				
				$i++;
				$outputArr[$i] = new Thread();
				$outputArr[$i]->setID($rs['threadID']);			
				$outputArr[$i]->setName($rs['threadName']);
				
				
			} else {
				$outputArr[$i] = new Thread();
				$outputArr[$i]->setID($rs['threadID']);			
				$outputArr[$i]->setName($rs['threadName']);
			}
			
			
			$i++;
		}
		
		return $outputArr;
		
	}		
}
 
 
 
 
?>
