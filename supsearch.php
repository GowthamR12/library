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
	<nav>
	<input id="nav-toggle" type="checkbox">
	
	<ul class="links">
		<li><a class="logo-1" href="index.php"><img src="https://cmscollege.ac.in/wp-content/uploads/2016/10/CMS-Logo_horizontal-Low.png" height=70px width=150px><br>PG Department of Commerce(SF)<br>CMS College Kottayam</a></li>
		<li><a href="admin_home.php">LIBRARIAN</a></li>
		<li><a href="faculty_log.php">FACULTY</a></li>
		<li><a href="student_log.php">STUDENT</a></li>
		<li ><a style="float:left" href="index.php">HOME</a></li>
	
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
<center><div>
	<form action="" method="post">
		<br><select class="select">
			<option name="accno">ACCESSION NO</option>
			<option name="author">AUTHOR</option>
			<option name="title">TITLE</option>
		</select>
		<input type="text" class="input" name="se" placeholder="Search Books Here" size="125">
		<button type="submit" class="button" name="buse" >SEARCH</button>
	
	</form>


</div>
</center>


<br>
<br>
<br>
<br>
<div style="background-color: white;opacity:0.8">
<div>
	<center>
		
	<table border="1px">
	
				<?php
		if(isset($_POST["buse"]))
		{	
			?>
			<h1 style="color:red">SEARCH RESULTS</h1>
				
	

		<?php
			$sql="select books.title,books.author,books.bid,bookacc.accno,books.shelfno,bookacc.isissued from books inner join bookacc on books.bid=bookacc.bfid where subid='{$_SESSION['SUBJECT']}' and (author like '%{$_POST['se']}%'  or title like '%{$_POST['se']}%' or accno like '%{$_POST['se']}%')"; 
			$res=$db->query($sql);
			if($res->num_rows>0)
			{?>
				<tr>
			
			<th>TITLE</th>
			<th>AUTHOR</th>
			<th>AVAILABLE</th>
			<th>NON-AVAILABLE</th>
			<th>LOCATION</th>
		</tr>
<?php 
				
				while($ro=$res->fetch_assoc())
				{?>
						<tr>
				
				<td><?php echo $ro["title"];?></td>
				<td><?php echo $ro["author"];?></td>
				<td><?php 
				if($ro["isissued"]=='no')
				{
					echo $ro["accno"];
				}
				else
				{
					echo "---";
				}

			?></td>
				<td><?php if($ro["isissued"]=='yes')
				{
					echo $ro["accno"];
				}
				else
				{
					echo "---";
				}

			?>
					
			
				
				<td><?php echo $ro["shelfno"];?></td>
				</tr>
		<?php
		} 
		
	}
	else
	{
		
		echo "<font color='red' size='5px' style='background-color:white;padding:10px'><strong>NO RESULTS FOUND.....!</strong></font>";
	}
}
?>
	</table>
</center>
</div>




<br>
<br>
<div>
	<center>
		<h1 style="color:red">Books</h1>
	<table border="1px">
	
				
		
				

	

		<?php
			$sql="select * from books where subid='{$_SESSION['SUBJECT']}' "; 
			$res=$db->query($sql);
			if($res->num_rows>0)
			{?>
				<tr>
			
			<th>TITLE</th>
			<th>AUTHOR</th>
			<th>AVAILABLE</th>
			<th>NON-AVAILABLE</th>
			<th>LOCATION</th>
		</tr>
		<?php 
				
				while($ro=$res->fetch_assoc())
				{?>
						<tr>
				
				<td><?php echo $ro["title"];?></td>
				<td><?php echo $ro["author"];?></td>
				<td><?php 
				$sqa="select * from bookacc where bfid='{$ro['bid']}'";
					$rea=$db->query($sqa);
					if($rea->num_rows>0)
					{
						while($roa=$rea->fetch_assoc())
						{
							if($roa["isissued"]=='no')
								{
						
					echo "<br>".$roa["accno"];
				}
					}
				}
				
				else
				{
					echo "---";
				}

			?></td>
				<td><?php 
				$sqa="select * from bookacc where bfid='{$ro['bid']}'";
					$rea=$db->query($sqa);
					if($rea->num_rows>0)
					{
						while($roa=$rea->fetch_assoc())
						{
							if($roa["isissued"]=='yes')
								{
						
					echo "<br>".$roa["accno"];
				}
					}
				}
				
				else
				{
					echo "---";
				}

			?>
					
			
				
				<td><?php echo $ro["shelfno"];?></td>
				</tr>
		<?php
		} 
		
	}
	else
	{
		echo "<font color='red' size='5px' style='background-color:white;padding:10px'><strong>NO RESULTS FOUND.....!</strong></font>";
	}

?>
	</table>
</center>
</div>
<br>
<br>
</div>




<center><span style='  padding: 10px;color:#333333;font-family: sans-serif;font-weight: bold;font-size: 20px;position:relative;left: -250px;display:inline-block;'><?php

 		if(isset($_GET['reg']))
 		{
 			echo $_GET['reg'];
 		} 
?></span></center>

</body>
</html>

