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
<table>
		<tr>
			<th>Username</th>
			<th>Accession No</th>
			<th>Title</th>
			<th>Issued Date</th>
			<th>Return Date</th>
		</tr>
		<?php
			$sql="select * from fac_book_issue where ret_stat=1";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				while($ro=$res->fetch_assoc())
				{?>
		<tr>
			
			<td><?php echo $ro["email"];?></td>
			<td><?php echo $ro["book_acc"];?></td>
			<td><?php echo $ro["book_title"];?></td>
			<td><?php echo $ro["issue_date"];?></td>
			<td><?php echo $ro["return_date"];?></td>
		</tr>

		<?php
				}
			}
			else
			{
				echo "Empty";
			}
		?>
	</table>
</body>
</html>