<?php
//Created on Feb 2, 2013

 
 class ListSections {
	public function getAllSectionsArray($conn, $courseID) {
		require_once("clsSection.php");
		
		$sql = "SELECT * FROM course, section WHERE sectionCourseID = " . $courseID . " AND courseID = sectionCourseID ORDER BY sectionID";
		$e = mysql_query($sql, $conn);
		$sectionArr = array();
		$i = 0;
		
		while ($rs = mysql_fetch_array($e)) {
			$sectionArr[$i] = new Section();
			$sectionArr[$i]->setID($rs['sectionID']);			
			$sectionArr[$i]->setName($rs['sectionName']);
			$sectionArr[$i]->setDescription($rs['sectionDescription']);
			$i++;
		}
		
		return $sectionArr;
		
	}		

}
?>
