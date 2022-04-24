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
		<input tyep="text" placeholder="Search Faculty" name='sea' class='input'>
		<button type="submit" name="fac" class="button">search</button>
		</form>
	</center>
		

	</div>

<center>
		<div>	

   <?php 
   if(isset($_POST['fac']))
   {

 
   	if($_POST['sea']!=null)
	{
   	$sql="select * from faculty where username like '%{$_POST['sea']}%'";
   	$res=$db->query($sql);
   	if($res->num_rows>0)
   	{
?>

		<table border="1px" >
			<font color="red" size="10px">SEARCH RESULT</font>
		<tr>
			<th>SI NUMBER</th>
			<th>FACULTY NAME</th>
		</tr>	
		<?php
   		$i=1;
		while($ro=$res->fetch_assoc())
		{ ?>
			<form action="" method="post">
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ro["username"];?></td>
			<input type="hidden" name="chk" value="<?php echo $ro['fid']; ?>">
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
	$sq="select * from faculty where fid='$id'";
	$rest=$db->query($sq);
	if($rest->num_rows>0)
	{
		$rot=$rest->fetch_assoc();
		$_SESSION["EMAIL"]=$rot['email'];
		header('location:fac_book_view.php');
	}	
}

?>




	
<div>
	<center>
		
	<table border="1px" >
		<tr>
			<th>SI NUMBER</th>
			<th>FACULTY NAME</th>
		</tr>
			<?php
	$sql="select * from faculty";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{	$i=1;
		while($ro=$res->fetch_assoc())
		{ ?>
			<form action="" method="post">
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ro["username"];?></td>
			<input type="hidden" name="chk" value="<?php echo $ro['fid']; ?>">
			<td><button type="submit" name="send" class="button">view</button></td>
		</tr>
			
		<?php $i++;}
	}
	else
	{
		echo "<br>NO ENTRY<br>";
	}
?>
		
	</table>
</center>
</div>
</body>
</html>
	

	

			
		</table>
</body>
</html>