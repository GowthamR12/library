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
			<li><a href="index.php">HOME</a></li>
	
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
		<br>

<br>
<br>

<div>
	<?php
		
		if(isset($_POST["submit"]))
		{
			


			$_SESSION["SUBJECT"]=$_POST["chk"];
			header('location:supsearch.php');
		
	}
		
    

	?>
	<center><div>
		<form action="" method="post">
		<input tyep="text" placeholder="Search Subject" name='sea' class='input'>
		<button type="submit" name="sub" class="button">search</button>
		</form>
		

	</div>

	
			
   <?php 
   if(isset($_POST['sub']))
   {
 
   	if($_POST['sea']!=null)
	{
   	$sql="select * from subject where subject like '%{$_POST['sea']}%'";
   	$res=$db->query($sql);
   	if($res->num_rows>0)
   	{

   		?><div style="height: 500px;background-color:white;opacity:0.8">	
   		<center><h1 style="color: black;background-color: white;opacity: 0.8;padding: 10px;">Search Result</h1></center>
   		<?php
   		while($ro=$res->fetch_assoc())
   		{?>
   			
   			
   				<div style="float:left;margin:20px ;">
   				<form action="" method="post">
   			<input type="hidden" name="chk" value="<?php echo $ro['subid'];?>">
   			<button type="submit" class="buttonsub" name="submit"><?php echo $ro["subject"];?></button>
   		</form>

   		</div>
   	
   		<?php
   	}
   	}
   	else
   	{
   		echo "<font color='red' size='5px' style='background-color:white;padding:5px'><strong>NO BOOKS</strong></font>";
   	}

   	
   }
   else
   {
   		echo "<font color='red' size='5px' style='background-color:white;padding:5px'><strong>NO BOOKS</strong></font>";
   }
}


   	?>
   </div>
	<center>
		<div style="height: 2000px;background-color:white;opacity:0.8">
			<center><h1 style="color: blck;background-color: white;opacity: 0.8;padding: 10px;">Choose Subject</h1></center>
   

   <?php 

   	$sql="select * from subject";
   	$res=$db->query($sql);
   	if($res->num_rows>0)
   	{
   		while($ro=$res->fetch_assoc())
   		{?>
   			
   			
   				<div style="float:left;margin:20px ;">
   				<form action="" method="post">
   			<input type="hidden" name="chk" value="<?php echo $ro['subid'];?>">
   			<button type="submit" class="buttonsub" name="submit"><?php echo $ro["subject"];?></button>
   		</form>

   		</div>
   	
   		<?php
   	}
   }
  
   	



   	?>
   </div>
</center>
</div>

<center><span style='  padding: 10px;color:white;font-family: sans-serif;font-weight: bold;font-size: 20px;position:relative;left: -250px;display:inline-block;'><?php

 		if(isset($_GET['reg']))
 		{
 			echo $_GET['reg'];
 		} 
?></span></center>"

</body>
</html>

