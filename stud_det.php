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
		<caption>CLICK ON CHECKBOX TO VIEW BOOK DETAILS</caption>

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