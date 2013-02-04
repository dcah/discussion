<?php
/*
 * Created: 2 February 2013
 * Author: Dan Hillman (dhillman@bu.edu)
 * 
 */
 
require("classes/clsDatabase.php");
require("classes/clsListSections01.php");
 
$dbObj = new Database();
$listingObj = new ListSections();

// $courseID identifies which course to list
$courseID = 1;

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
	foreach ($listingArr as $key=>$value) {
			
	// Write the div class according to object type
	print '<div class="';
	if (get_class($value) == "Section")
		print 'section';
	else
		print 'topic';
	print '">';
		
?>

<p><?= $value->getName() ?></p>
<p><?= $value->getDescription() ?></p>
</div>		

<?php				
	}
?>



</body>
</html>