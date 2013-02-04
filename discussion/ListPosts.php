<?php
/*
 * Created: 2 February 2013
 * Author: Dan Hillman (dhillman@bu.edu)
 */
 
require("classes/clsDatabase.php");
require("classes/clsListPosts.php");
 
$dbObj = new Database();
$listingObj = new ListPosts();

//Only fetch posts for this id
$postThreadID = 7;

$listingArr = $listingObj->getAllPostsArray($dbObj->getDbConn(), $postThreadID);
 
 
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

	if (get_class($value) == "Topic") {
		print $value->getName();
	} else {
		
$value->getID();
$value->getUser();
$value->getFollows();
$value->time_elapsed_string($value->getTimestamp());


$value->getContent();
		
	}
}

?>


<table class="data">
<tr>
<th>ID</th>
<th>UserID</th>
<th>Follows</th>
<th>Timestamp</th>
<th>Content</th>
</tr>

<?php
	foreach ($listingArr as $key=>$value) {
?>

<td><?= $value->getID() ?></td>
<td><?= $value->getUser() ?></td>
<td><?= $value->getFollows() ?></td>
<td>Posted <?= $value->time_elapsed_string($value->getTimestamp()) ?> ago</td>


<td><?= $value->getContent() ?></td>
</tr>		

<?php				
	}
?>

</table>
</body>
</html>
