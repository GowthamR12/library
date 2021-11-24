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
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body class="body">
<?php
	if(isset($_POST["return"]))
	{
		$date=date("Y/m/d");
		$sbid=$_POST["chk"];
		$_SESSION["SBID"]=$sbid;

	
				$sql="select * from stud_book_issue where sbid='$sbid'";
				$res=$db->query($sql);
				if($res->num_rows>0)
				{
					$ro=$res->fetch_assoc();
					$uprn=$ro["uprn"];
					$accno=$ro["book_acc"];
					
					$yop="select DATEDIFF(returned,issue_date) as diff from stud_book_issue where sbid='$sbid'";
					$yeop=$db->query($yop);
					if($yeop->num_rows>0)
					{
							$rops=$yeop->fetch_assoc();
							$diff=$rops["diff"];
							echo $diff;
					}
					if($diff<=14)
					{
					
						$di=0;
						$up="update stud_book_issue set fine_status=0,returned='$date',ret_stat=1 where sbid='$sbid'";
						if($db->query($up))
						{
								$stui="update student set tot=tot-1 where uprn='$uprn'";
								if($db->query($stui))
								{
										$sqlac="update bookacc set isissued='no' where accno='$accno'";
										if($db->query($sqlac))
										{
											header("location:stud_fine.php?mes=".$di);
										}
										else
										{
											echo "can change bookacc";
										}
								}
								else
								{
									echo "cant update student";
								}
						}
						else
						{
							echo "cant update fine status";
						}
					}
					else if($diff>14)
					{	
												$di=$diff-14;
						$up="update stud_book_issue set fine_status=0,returned='$date',ret_stat=1 where sbid='$sbid'";
						if($db->query($up))
						{
								$stui="update student set tot=tot-1 where uprn='$uprn'";
								if($db->query($stui))
								{
										$sqlac="update bookacc set isissued='no' where accno='$accno'";
										if($db->query($sqlac))
										{
											header("location:stud_fine.php?mes=".$di);
										}
										else
										{
											echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>CANT CHANGE ACCESSION NUMBER </span></center>";
										}
								}
								else
								{
									echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>CAN'T UPDATE STUDENT</span></center>";
								}
						}
						else
						{
							echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>CAN'T UPDATE FINE STATUS </span></center>";
						}
					}
				}

		}
			

?>
<center>	
		<nav>
	<input id="nav-toggle" type="checkbox">
	
	<ul class="links">
		<li><a href="stud_report_set.php">REPORT</a></li>
		<li><a href="stud_book_receive.php" >ADD ISSUING DETAILS</a></li>
		<li><a href="librarian_view.php">HOME</a></li>
	
	</ul>
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>

<br>
<br><br><br><br>
<br>
		<br>
		<br>
		<br>
		<div>

<div>
	

		<?php
			$sql="select * from stud_book_issue where ret_stat=0";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{?>
					<table>
			<tr>
				<th>Name</th>
			<th>UPRN</th>
			<th>Accession No</th>
			<th>Issued Date</th>
			<th>Actual Return Date</th>
		</tr>


				<?php
				while($ro=$res->fetch_assoc())
				{?> <form action="" method="post">
					<tr>
					<td><?php echo $ro["stname"];?></td>
					<td><?php echo $ro["uprn"];?></td>
					<td><?php echo $ro["book_acc"]; ?></td>
					<td><?php echo $ro["issue_date"];?></td>
					<td><?php echo $ro["actual"]; ?></td>
					<input type="hidden" name="chk" value="<?php echo $ro['sbid'];?>">
					<td><button type="submit" class="button" name="return">Returned</button></td>
					</tr>
				</form>
				<?php
				}
			}
			else
			{
				echo "Empty";
			}
		?>
		
	</table>

</div>
</center>
</body>
</html>