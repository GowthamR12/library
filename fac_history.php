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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">

<a href="logout.php"><button class="button">LOGOUT</button></a>
<center><div>
<table>
	
			<?php
				$sql="select * from fac_book_issue where fid='{$_SESSION['ID']}' and ret_stat=1";
				$res=$db->query($sql);
				if($res->num_rows>0)
				{?>
						<tr>
			<th>ACCESSION NUMBER</th>
			<th>TITLE</th>
			<th>ISSUED</th>
			<th>RETURNED</th>

		</tr><?php
					while($ro=$res->fetch_assoc())
					{?>
						<tr>

						<td><?php echo $ro["book_acc"]; ?></td>
							<td><?php echo $ro["book_title"]; ?></td>
						<td><?php echo $ro["issue_date"]; ?></td>
						<td><?php echo $ro["return_date"]; ?></td>
						</tr>
					<?php
					}

				}
				else
				{
					echo "No Books";
				}


			?>
	
		
		</table>
	</div></center>
</body>
</html>