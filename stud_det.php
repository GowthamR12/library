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
		<link rel="stylesheet" type="text/css" href="style.css">

	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title></title>
</head>
<body class="body">

<a href="librarian_view.php"><button class="button">HOME</button></a>

		<div>
	<center>
		<form action="" method="post">
		<input tyep="text" placeholder="Search Student" name='sea' class='input'>
		<button type="submit" name="stu" class="button">search</button>
		</form>
	</center>
		

	</div>

<center>
		<div>	

			
   <?php 
   if(isset($_POST['stu']))
   {
   
 
   	if($_POST['sea']!=null)
	{
   	$sql="select * from student where username like '%{$_POST['sea']}%' or uprn like '%{$_POST['sea']}%'";
   	$res=$db->query($sql);
   	if($res->num_rows>0)
   	{
   			?>
   	<table border="1px" >
			<font color="red" size="10px">SEARCH RESULT</font>
		<tr>
			<th>SI NUMBER</th>
			<th>FACULTY NAME</th>
		</tr><?php

   		$i=1;
		while($ro=$res->fetch_assoc())
		{ ?>
			<form action="" method="post">
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ro["username"];?></td>
			<input type="hidden" name="chk" value="<?php echo $ro['sid']; ?>">
			<td><button type="submit" name="send" class="button">view</button></td>
		</tr>
			
		<?php $i++;}
	}
	else
	{
		echo "<br><font color='red'>NO ENTRY</font><br>";
	}

   	
   }
   
}


   	?>

	</table>
	<br>
	<br>
	<hr>
</center>
   </div>

<?php
if(isset($_POST['send']))
{
	$id=$_POST['chk'];
	$sq="select * from student where sid='$id'";
	$rest=$db->query($sq);
	if($rest->num_rows>0)
	{
		$rot=$rest->fetch_assoc();
		$_SESSION["STUDUPRN"]=$rot['uprn'];
		header('location:stud_book_view.php');
	}	
}

?>

	
<div>
	<center>
		

			<?php
	$sql="select * from student where isexp='active'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{	$i=1;?>
			<table border="1px" >
		<tr>
			<th>SI NUMBER</th>
			<th>STUDENT NAME</th>
			<th>UPRN</th>
			<th>PHONE NUMBER</th>
		</tr>
		<?php
		while($ro=$res->fetch_assoc())
		{ ?>
			<form action="" method="post">
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ro["username"];?></td>
			<td><?php echo $ro["uprn"];?></td>
			<td><?php echo $ro["phoneno"];?></td>
			<input type="hidden" name="chk" value="<?php echo $ro['sid']; ?>">
			<td><button type="submit" name="send" class="button">view</button></td>
		</tr>
			</form>
		<?php $i++;}
	}
	else
	{
		echo "<p style='font-size:50px'>NO ENTRY</p>";
	}
?>
		
	</table>
</center>
</div>
</body>
</html>