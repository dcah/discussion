<?php
/*
 * Created: 2 February 2013
 * Author: Dan Hillman (dhillman@bu.edu)
 */
 
require("classes/clsDatabase.php");
require("classes/clsListPosts.php");
 
$dbObj = new Database();
$listingObj = new ListPosts();

// $_GET['id'] is filtered and stored in $clean['id']
$clean = array();
if (ctype_digit($_GET['id'])) {
	$clean['id'] = $_GET['id'];
} else {
	$page = 'ListThreads.php';
 	header('Location:'.$page);
}



$listingArr = $listingObj->getAllPostsArray($dbObj->getDbConn(), $clean['id']);
 
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Posts</title>
<link href="media/discussion.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Posts</h1>

<?php

foreach ($listingArr as $key=>$value) {

	if (get_class($value) == "Thread") {
		
		print '<h2>' . $value->getName() . '</h2>';
		
		// Initiate table for posts
		print '<table class="data">';
	} else {
		print '<tr valign="top">';
		
		// User
		print '<td>';
		
		// If a path to an image exists, use it
		if ($value->getImagePath()) {
			print '<img src="' . $value->getImagePath() . '" width="100" height="100" alt=""><br />';		
		}
		
		// Close cell
		print $value->getUser() . '</td>';
				
		// Post
		print '<td>';
		
		//print '<div class="postid"><a href="#2">2</a></div>';
		
		print '<div class="postid"><a href="#' . $value->getRank() . '">' . $value->getRank() . '</a></div>';
		
		// Date posted
		print '<p>posted ' . $value->time_elapsed_string($value->getTimestamp()) . ' ago</p>';
		echo '<p>' . date("g:i a F j, Y ", strtotime($value->getTimestamp())) . '</p>';
		
		// Reply-to
		if ($value->getFollows())
			print '<p>reply to ' . $value->getFollows() . '</p>';
		
		
		print $value->getContent();
		
		// Use ID for Reply
		//print $value->getID();
		// End post
		print '</tr>';		
	}
}

// Close table
print '</table>';

?>



</body>
</html>