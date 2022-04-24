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
<body  class="body">
	<div>

		<a href="index.php"><button class="button">HOME</button></a>
</div>

	<?php
		/*accepts entire form values here by button name*/
		if(isset($_POST["adlog"]))
		{
			/*selecting values from admin table in the library database*/
			$pas=$_POST["adpass"];
			$pass=$pas;

			$sql = "select * from admin where email='{$_POST["ademail"]}' and password='$pass'";

			/*to make understand the php, the above " select * from" code is mysql query*/
			
			/*reseultset are formed*/
			$res = $db->query($sql);
			

			if($res->num_rows>0)
			{
				$ro=$res->fetch_assoc();

				$_SESSION["ID"]=$ro["aid"];
				$_SESSION["EMAIL"]=$ro["email"];
				echo "<script>window.open('librarian_view.php','_self')</script>";
			}
			else{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>INVALID USERNAME OR PASSWORD</span></center>";
			}
		}
	?>
	<center><div class="fac">
		
		<form action="" method="post">
			<fieldset>
			<label><font size="3px" color="white">ENTER EMAIL</label><br>
			<input type="Email" size=30 class="email" name="ademail"><br><br>
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


</body>
</html>