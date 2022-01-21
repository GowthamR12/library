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
	
	<div>
	<a href="index.php"><button class="button">HOME</button></a>
</div>

	<?php
	    /*checks for not null variables*/
		if(isset($_POST["login"]))
		{	
		
			$sqla="select * from student where uprn='{$_POST["uprn"]}' and password='{$_POST["pwd"]}' and isexp='active'";

			/*db is a variable that stores connection from database*/
			$rest = $db->query($sqla);

			if($rest->num_rows>0)
			{	
				$ros=$rest->fetch_assoc();
				$_SESSION["ID"]=$ros["sid"];
				$_SESSION["NAME"]=$ros["username"];
				header('location:student_home.php');
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
			<legend><font color="white">STUDENT LOGIN</legend>
				<label>ENTER UPRN</label><br>
			<input type="text"  name="uprn" size="30" class="email" ><br><br>
			<label>ENTER PASSWORD</label><br>
			<input type="password" name="pwd" size=30 class="email" ><br><br>
			
			<button type="submit" class="bu1" name="login">LOGIN</button><br>
			<br>

			<a href="emailverstud.php" class="link">forgot password...?<u>click here</u></a>
			</fieldset>
				</form>
				
					
		</div>

		</font>
	</center>



</body>
</html>