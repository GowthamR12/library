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
	<meta name="viewpot" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
	<div style="height:600px;background-color:whitesmoke;opacity:0.8">
	<center>


<h1 style="color:darkred;text-align:center;display:inline-block;font-weight: bold;font-family:sofia;">MY BOOKS</h1>
<div style="margin-left: 200px;display:inline-block">
		<p style="font-size:40px;color:black;">Hello,<?php echo $_SESSION["NAME"]; ?></p>
		<a href="logout.php"><button class="button">LOGOUT</button></a>
</div>
<div>
	<br>
	<br>
	<table>
	
			<?php


				$sql="select * from fac_book_issue where fid='{$_SESSION['ID']}' and ret_stat=0";
				$res=$db->query($sql);
				if($res->num_rows>0)
				{?>
					<caption>Present Books</caption>
						<tr>
			<th>ACCESSION NUMBER</th>
				<th>TITLE</th>
			<th>ISSUED</th>
			<th>DUE</th>
		
			</tr><?php
					while($ro=$res->fetch_assoc())
					{	
						?>
						<tr>
						<td><?php echo $ro["book_acc"]; ?></td>
						<td><?php echo $ro["book_title"];?></td>
						<td><?php echo $ro["issue_date"]; ?></td>
						<td><?php echo "<strong><font color='red'>".$ro["actual"]; ?></td>
						</tr>
					<?php
					}
				}
				else
				{
					echo "<div style='opacity:0.9;color:red;font-size:25px;display:inline-block;margin-top:20px;padding:20px'>No New Books..</div>";
				}


			?>
	
		
		</table>
	</div><br><br><br>
<div>

			<a href="fac_history.php" ><button class="button">HISTORY</button></a>
</div>
<div>
</body>
</html>