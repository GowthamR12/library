<?php
	include "database.php";
	session_start();

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
	<div class="topnav">
	<div class="topnav dis">
	<nav ><a href="admin_home.php">LIBRARIAN</a></nav>
	<nav ><a href="faculty_log.php">FACULTY</a></nav>
	<nav ><a href="student_log.php">STUDENT</a></nav>
	<nav class="logo"><a href="index.php"><img src="images/cms.svg" class="img"></a></nav>
</div>
</div>




		<br>
<center><div>
	<form action="" method="post">
		<br><select class="select">
			<option name="accno">ACCESSION NO</option>
			<option name="author">AUTHOR</option>
			<option name="title">TITLE</option>
		</select>
		<input type="text" class="input" name="se" placeholder="Search Book By Here" size="125">
		<button type="submit" class="button" name="buse" >SEARCH</button>
	
	</form>

</div>
</center>
<br>
<br>
<div>
	<center>
	<table border="1px">
	
				<?php
		if(isset($_POST["buse"]))
		{	?>
				<tr>
			<th>ACCESSION NUMBER</th>
			<th>TITLE</th>
			<th>AUTHOR</th>
			<th>AVAILABLE QUANTITY</th>
			<th>LOCATION</th>
		</tr><?php
			$sql="select books.shelfno,books.author,books.title,bookacc.accno,bookacc.isissued from books inner join bookacc on books.bid=bookacc.bfid  where author like '%{$_POST['se']}%' or accno like '%{$_POST['se']}%' or title like '%{$_POST['se']}%'"; 
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				
				while($ro=$res->fetch_assoc())
				{

					$sq="select * from bookacc where accno='{$ro['accno']}' and isissued='no'";
					$re=$db->query($sq);
					if($re->num_rows>0)
					{
						$i=0;
						while($rot=$re->fetch_assoc())
						{
							$i++;
						}
					}
					else
					{
						$i=0;
					}
				?>
					
				<tr>
				<td><?php echo $ro["accno"];?></td>
				<td><?php echo $ro["title"];?></td>
				<td><?php echo $ro["author"];?></td>
				<td><?php echo $i;?></td>
				<td><?php echo $ro["shelfno"];?></td>
				</tr>
		<?php 
		}
	}
	else
	{
		echo "<font color='red' size='5px'><strong>NO RESULTS FOUND.....!</strong></font>";
	}
}
?>
	</table>
</center>
</div>

<center><span style='  padding: 10px;color:#333333;font-family: sans-serif;font-weight: bold;font-size: 20px;position:relative;left: -250px;display:inline-block;'><?php

 		if(isset($_GET['reg']))
 		{
 			echo $_GET['reg'];
 		} 
?></span></center>"

</body>
</html>

