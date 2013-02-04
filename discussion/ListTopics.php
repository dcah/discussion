<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require("classes/clsDatabase.php");
require("classes/clsListTopics.php");
 
$dbObj = new Database();
$listingObj = new ListTopics();

$listingArr = $listingObj->getAllTopicsArray($dbObj->getDbConn());
 
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Topics</title>
<link href="media/discussion.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Topics</h1>

<table class="data">
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
</tr>

<?php
	foreach ($listingArr as $key=>$value) {
?>

<td><?= $value->getID() ?></td>
<td><?= $value->getName() ?></td>
<td><?= $value->getDescription() ?></td>
</tr>		

<?php				
	}
?>

</table>
</body>
</html>
