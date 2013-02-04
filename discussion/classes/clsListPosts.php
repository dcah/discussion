<?php
//Created on Feb 2, 2013

 
 class ListPosts {
	public function getAllPostsArray($conn, $postThreadID) {
		require_once("clsPost.php");
		require_once("clsThread.php");
		
		//$sql = "SELECT * FROM post WHERE postThreadID = " . $postThreadID . " ORDER BY postID";
		
		//$sql = "SELECT * FROM thread, post WHERE postThreadID = " . $postThreadID . " AND postThreadID=threadID ORDER BY postID";
		
		$sql = "SELECT * FROM thread, post, user WHERE postThreadID = " . $postThreadID . " AND postThreadID=threadID AND userID=postUserID ORDER BY postID";
		
		
		
		
		
		$e = mysql_query($sql, $conn);
		$outputArr = array();
		$i = 0;
		
		while ($rs = mysql_fetch_array($e)) {
			// Make the fist item a topic (and the first thread)
			if ($i == 0) {		
				$outputArr[$i] = new Thread();
				$outputArr[$i]->setName($rs['threadName']);
				$i++;	
			}
			
			
			$outputArr[$i] = new Post();
			$outputArr[$i]->setID($rs['postID']);
			$outputArr[$i]->setUser($rs['userName']);		
			$outputArr[$i]->setFollows($rs['postFollows']);
			$outputArr[$i]->setTimestamp($rs['postTimestamp']);
			$outputArr[$i]->setContent($rs['postContent']);
			$outputArr[$i]->setImagePath($rs['userImagePath']);
			$outputArr[$i]->setRank($i);
			$i++;
		}
		
		return $outputArr;
		
	}		
}
?>
