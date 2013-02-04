<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require("classes/clsDatabase.php");
require("classes/clsListSections.php");
 
$dbObj = new Database();
$listingObj = new ListSections();

$listingArr = $listingObj->getAllSectionsArray($dbObj->getDbConn());
 
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Sections</title>
<link href="media/discussion.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Sections</h1>

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
