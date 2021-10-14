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


	<center><div>
				<table>
			<tr>
				<th>No</th>
				<th>ACCESSION NUMBER</th>
				<th>RETURNED</th>
				<th>FINE</th>
			</tr>
	<?php
		$sql="select * from stud_book_issue where uprn='{$_SESSION['STUDUPRN']}'";
		$res=$db->query($sql);
		$i=1;
		if($res->num_rows>0)
		{
			while($ro=$res->fetch_assoc())
			{?>
						<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $ro["book_acc"]; ?></td>
				<td>
					<?php 
						if($ro["ret_stat"]==1)
						{
							echo "Returned";
						}
						else
						{
							echo "Issued";
						}
					?>
				<td><?php echo $ro["fine_status"];?></td>
			</tr>

			<?php $i++;
			}

		}

	?>
	

	

			
		</table>
</body>
</html>