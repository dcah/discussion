<?php
/*
 * Created: 2 February 2013
 * Author: Dan Hillman (dhillman@bu.edu)
 */
 
require("classes/clsDatabase.php");
require("classes/clsListThreads.php");
 
$dbObj = new Database();
$listingObj = new ListThreads();

// $_GET['id'] is filtered and stored in $clean['id']
$clean = array();
if (ctype_digit($_GET['id'])) {
	$clean['id'] = $_GET['id'];
} else {
	$page = 'ListSections.php';
 	header('Location:'.$page);
}


$listingArr = $listingObj->getAllThreadsArray($dbObj->getDbConn(), $clean['id']);
  
?>

<!DOCTYPE html>
<html>
<head>
<title>Theads</title>
<link href="media/discussion.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Theads</h1>

<table class="data">

<?php

foreach ($listingArr as $key=>$value) {

	if (get_class($value) == "Topic") {
		print '<tr><td colspan="4" class="threadHeader">';		
		print '<p>' . $value->getName() . '</p>';
		print '<p>' . $value->getDescription() . '</p></td></tr>';
		print '<tr><th>Thread</th><th>Activity</th><th>Unread</th><th>Posts</th></tr>';			
	} else {
		print '<tr>';		
		print '<td><a href="ListPosts.php?id=' . $value->getID() . '">' . $value->getName() . '</a></td>';
		print '<td></td>';
		print '<td></td>';
		print '<td></td>';
	}
	print '</tr>';

}

?>



</body>
</html>