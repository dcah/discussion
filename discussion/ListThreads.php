<?php
/*
 * Created on Feb 2, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require("classes/clsDatabase.php");
require("classes/clsListThreads.php");
 
$dbObj = new Database();
$listingObj = new ListThreads();

$listingArr = $listingObj->getAllThreadsArray($dbObj->getDbConn());
 
 
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
<tr>
<th>ID</th>
<th>Name</th>
</tr>

<?php
	foreach ($listingArr as $key=>$value) {
?>

<td><?= $value->getID() ?></td>
<td><?= $value->getName() ?></td>
</tr>		

<?php				
	}
?>

</table>
</body>
</html>
