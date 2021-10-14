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
	<?php
	if(isset($_POST["pay"]))
	{
		$sql="update stud_book_issue set paid='yes',fine_status='{$_GET['mes']}' where sbid='{$_SESSION['SBID']}'";
		if($db->query($sql))
		{
			header('location:stud_book_issue.php');
		}

	}


	?>
	<center><div style="margin-top:500px;background-color:black;opacity:0.8">
		<font size="10px" color="white"><?php if(isset($_GET['mes'])){ echo $_GET["mes"];}?></font><br>
		<form action="" method="post">
		<button type="submit" class="button" name="pay">PAY</button>
		</form>
		</div>
	</center>

</body>
</html>