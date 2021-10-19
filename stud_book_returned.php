<?php
include "database.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		header('location:index.php?reg=Access Denied..');
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<title></title>
</head>
<body class="body">
		<center><table>
	<tr>
		<th>UPRN</th>
		<th>ACCESSION NUMBER</th>
		<th>ISSUED DATE</th>
		<th>RETURNED DATE</th>
		<th>TOTAL FINE</th>
	</tr>
<?php


	$sql="select * from stud_book_issue where ret_stat=1 order by sbid desc ";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		while($ro=$res->fetch_assoc())
		{?>
				<tr>
				<td><?php echo $ro["uprn"];?></td>
				<td><?php echo $ro["book_acc"];?></td>
				<td><?php echo $ro["issue_date"];?></td>
				<td><?php echo $ro["returned"];?></td>
				<td><?php echo $ro["fine_status"];?></td>
				</tr>
		<?php
		}
	}
	else{
		echo "Empty";
	}
?>



</table>
</body>
</html>