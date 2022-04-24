<?php

	include "database.php";
	session_start();

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
	
	<div>
	<a href="index.php"><button class="button">HOME</button></a>
</div>

<center><div class="fac">
		
		<form action="" method="post">
			<fieldset>
			<label>ENTER PASSWORD</label><br>
			<input type="Password" size=30 class="email" name="adpass"><br>
			<br>
			<button type="submit" class="bu1" name="adlog">SUBMIT</button><br>
			<br>
			

		</font>
		</fieldset>
		</form>
	</div>
	</center>

		<?php
		if(isset($_POST["adlog"]))
		{
			$pass=$_POST["adpass"];
			
			$sql="update admin set password='$pass'where aid='{$_SESSION['ID']}'";
			if($db->query($sql))
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>SUCCESS</span></center>";
				header('Location:admin_home.php');
				exit;
			}
			else
			{
				echo "<center><span style='padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;top:50px;display:inline-block;color:white;'>FAILED</span></center>";
			}
		}

	
	?>

</body>
</html>