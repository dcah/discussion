<?php
/*
 * Created: 2 February 2013
 * Author: Dan Hillman (dhillman@bu.edu)
 * 
 */
 
require("classes/clsDatabase.php");
require("classes/clsListSections.php");
 
$dbObj = new Database();
$listingObj = new ListSections();

// $courseID identifies which course to list
$courseID = 2;

$listingArr = $listingObj->getAllSectionsArray($dbObj->getDbConn(), $courseID);

 
?>

<!DOCTYPE html>
<html>
<head>
<title>Discussions</title>
<link href="media/discussion.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Discussions</h1>



<?php
// Different output for different objects
foreach ($listingArr as $key=>$value) {

	if (get_class($value) == "Section") {
		print '<div class="section">';		
		print '<p>' . $value->getName() . '</p>';
		print '<p>' . $value->getDescription() . '</p>';		
		print '</div>';
	} else {
		print '<div class="topic">';		
		print '<p><a href="listThreads.php?id=' . $value->getID() . '">' . $value->getName() . '</a></p>';
		print '<p>' . $value->getDescription() . '</p>';
		print '</div>';
	}


}
?>

</body>
</html>