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
		<caption>CLICK ON CHECKBOX TO VIEW BOOK DETAILS</caption>
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
			<td><input type="checkbox" name="chk" value="<?php echo $ro['fid']; ?>"></td>
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