<?php 
include "database.php";
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="body">
		
		<a href="librarian_view.php"><button class="button">HOME</button></a>
	<?php

		$sql="select * from stud_book_issue where book_acc='{$_GET['acc']}' and ret_stat=0";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			$ro=$res->fetch_assoc()?>
			<div style="background-color: white;padding:100px;opacity: 0.8;">
			<h3>ISSUED TO STUDENT</h3>
			<p><?php echo $ro["stname"];?></p>
			<p><?php echo $ro["uprn"];?></p>
			<?php 

			$sq="select * from student where uprn='{$ro['uprn']}'";
			$ret=$db->query($sq);
			if($ret->num_rows>0)
			{
				$rt=$ret->fetch_assoc();
			?> <p><?php echo $rt["phoneno"]; ?></p>
				</div> 
			<?php
			}
		
		}
		else{
				$sqlf="select * from fac_book_issue where book_acc='{$_GET['acc']}' and ret_stat=0";
		$resf=$db->query($sqlf);
		if($resf->num_rows>0)
		{
			$rof=$resf->fetch_assoc()?>
			<div style="background-color: white;padding:100px;opacity: 0.8">
			<h3>ISSUED TO FACULTY</h3>
			<p><?php echo $rof["facname"];?></p>
			<p><?php echo $rof["email"];?></p>
			<?php 

			$sqf="select * from faculty where email='{$rof['email']}'";
			$retf=$db->query($sqf);
			if($retf->num_rows>0)
			{
				$rtf=$retf->fetch_assoc();
			?> <p><?php echo $rtf["phoneno"]; ?></p>
				</div> 
			<?php

		}
		
	}
}

   ?>
</body>
</html>