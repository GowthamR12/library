<?php

	include "database.php";
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body" >
	<div>
	<a href="index.php"><button class="button">HOME</button></a>
</div>
	<?php
		if(isset($_POST["login"]))
		{
			$slrt="select * from faculty where email='{$_POST['facemail']}' and password='{$_POST['pass']}'";
			$rese=$db->query($slrt);

			if($rese->num_rows>0)
			{
				$rot=$rese->fetch_array();
				$_SESSION["ID"]=$rot["fid"];
				$_SESSION["NAME"]=$rot["username"];
				header('location:faculty_home.php');
			}
			else
			{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>LOGIN FAILED</span></center>";	
			}

		}
	?>
	
		<center><div class="fac">
			<form action="" method="post">
			<fieldset>
			<legend><font color="white">FACULTY LOGIN</legend>
			<br>
			<label>ENTER EMAIL:</label><br>
			<input type="email" size=30 name="facemail" class="email"><br><br>
			<label>ENTER PASSWORD</label><br>
			<input type="password" name="pass" size=30 class="email"><br><br>
			<br>
			<button type="submit" class="bu1" name="login">LOGIN</button><br>
			<br>

			<a href="emailverfac.php" class="link">forgot password...?<u>click here<u></a>
			</fieldset>
			</form>
				
		</div>
		<?php
			if(isset($_POST["register"]))
			{
				$name=$_POST["usr"];
				$email=$_POST["facemail"];
				$phone=$_POST["phone"];
				$pass=$_POST["pass"];

				$sql = "insert into faculty(username,email,phoneno,password) values('$name','$email','$phone','$pass')";
				
				if($db->query($sql))
				{
					header('location:index.php');
				}
				else
				{
					echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>REGISTRATION FAILED</span></center>";	
				}

			}

		?>
		<div class="fac">
			<form action="" method="post">
				<fieldset>
					<legend> FACULTY REGISTRATION </legend>
					<br>
				<label>ENTER USERNAME</label><br>
				<input type="text"size="30" name="usr" class="email" required="required"><br><br>
				<label>ENTER EMAIL</label><br>
				<input type="email" name="facemail" size="30" class="email"><br><br>
				<label>ENTER PHONE</label><br>
				<input type="text" name="phone" size="30" class="email"><br><br>
				<label>ENTER PASSWORD</label><br>
				<input type="password" name="pass" size="30" class="email"><br><br>
				<button type="submit"class="bu1" name="register">REGISTER</button>
			</fieldset>
			</form>

		</div>
		</font>
	</center>
</body>
</html>