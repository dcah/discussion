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
<script type="text/javascript" src="media/jquery-1.9.1.min.js"></script>
</head>
<body>
<h1>Posts</h1>
<p>test1</p>
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
		
		// Add user and close cell
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

<p>test</p>

<div id="paragraph">
A paragraph typically consists of a unifying main point, thought, or idea accompanied by supporting details. The non-fiction paragraph usually begins with the general and moves towards the more specific so as to advance an argument or point of view. Each <a rel="tooltip" title="A paragraph typically consists of a unifying main point, thought, or idea accompanied by <b>supporting details</b>">paragraph</a> builds on what came before and lays the ground for what comes next. Paragraphs generally range three to seven sentences all combined in a single paragraphed statement. In prose fiction successive details, for example; but it is just as common for the point of a prose paragraph to occur in the middle or the end. A paragraph can be as short as one word or run the length of multiple pages, and may consist of one or many <a rel="tooltip" title="Testing of Sentences">sentences</a>. When dialogue is being quoted in fiction, a new paragraph is used each time the person being quoted changed.
</div>

</body>
</html>