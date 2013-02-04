<?php
//Created on Feb 2, 2013

 
 class ListSections {
	public function getAllSectionsArray($conn, $courseID) {
		require_once("clsSection.php");
		require_once("clsTopic.php");
		
		//$sql = "SELECT * FROM course, section WHERE sectionCourseID = " . $courseID . " AND courseID = sectionCourseID ORDER BY sectionID";
		
		//$sql = "SELECT * FROM course, section, topic WHERE sectionCourseID = " . $courseID . " AND courseID = sectionCourseID AND topicSectionID = sectionID";
		
		
		//$sql = "SELECT * FROM section LEFT JOIN topic ON sectionID=topicSectionID";
		
		$sql = "SELECT * FROM section LEFT JOIN topic ON sectionID=topicSectionID WHERE sectionCourseID = " . $courseID . " ORDER BY sectionRank, topicRank";
		
		
		
		
		
		$e = mysql_query($sql, $conn);
		
		$sectionArr = array();		
		$topicArr = array();
		$outputArr = array(); // Collection of sections and topics, in order
		
		$i = 0;
		$j = 0;
		$initialSectionID = "";
		
		while ($rs = mysql_fetch_array($e)) {
			
			
			// If a sectionID exists and is original, make a section
			if (($rs['sectionID']) && ($rs['sectionID'] != $initialSectionID)) {
			
				// Hold onto sectionID to check against uniqueness later
				$initialSectionID = $rs['sectionID'];					
				
				$sectionArr[$i] = new Section();
				$sectionArr[$i]->setID($rs['sectionID']);			
				$sectionArr[$i]->setName($rs['sectionName']);
				$sectionArr[$i]->setDescription($rs['sectionDescription']);
				
				// Add it to $outputArr and increment its object number
				$outputArr[$j] = $sectionArr[$i];
				$j++;
			}
			
			// If a topicID exists, make a topic
			if ($rs['topicID']) {
				$topicArr[$i] = new Topic();
				$topicArr[$i]->setID($rs['topicID']);			
				$topicArr[$i]->setName($rs['topicName']);
				$topicArr[$i]->setDescription($rs['topicDescription']);
				
				// Add it to $outputArr and increment its object number
				$outputArr[$j]=$topicArr[$i];
				$j++;
			}
			
			
			
			$i++;
		}
		
		return $outputArr;
		
	}		

}
?>
