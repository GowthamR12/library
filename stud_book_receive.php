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
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<title></title>
</head>
<body class="body">
	<?php

			//remember to add returned status to 0/1 in stud_book_issue table

		if(isset($_POST["sub"]))
		{
			$uprn=$_POST["uprn"];
			$acc=$_POST["acc"];

			$date=date("Y/m/d");
			$act = date('Y/m/d',strtotime($date . "+14 days"));
			
			$jq="select * from bookacc where accno='$acc'";
			$rp=$db->query($jq);
			if($rp->num_rows>0)
			{

				$rop=$rp->fetch_assoc();
				if($rop["isissued"]=='no')
				{
					$sqla="select * from student where uprn='$uprn'";
					$res=$db->query($sqla);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$sid=$ro["sid"];
						$role=$ro["role"];
						$tot=$ro["tot"];
						if(($role=='ug' and $tot<3) or ($role=='pg' and $tot<7))
						{
							$sql="insert into stud_book_issue(sid,uprn,issue_date,actual,book_acc)  values('$sid','$uprn','$date','$act','$acc')";
							if($rest=$db->query($sql))
							{
								echo "success with stud_issue";
								$sq="update bookacc set isissued='yes' where accno='$acc'";
								$tq="update student set tot=tot+1 where uprn='$uprn'";
								
					
								if($re=$db->query($sq) and $rep=$db->query($tq))
								{
									header('Location:stud_book_issue.php');
								}
								else
								{
									echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED TO UPDATE ISSUE </span></center>";
								}
							}
							else
							{
								echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED TO ISSUE TO THIS STUDENT</span></center>";
							}

					
						}
						else{
							echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>STUDENT'S AVAILABLE BOOKS EXCEEDS LIMIT</span></center>";
						}
						
					} 
					else{
						echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>STUDENT IS NOT REGISTERED</span></center>";
					}
				

				}else{
					echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>Already Issued</span></center>";

				}
			}
			else{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>THIS IS ISSUED/NOT AVAILABLE</span></center>";
			}
				
				

		}
	?>
	<center><div class="fac">
	<fieldset>
		<legend>RECORD RETURNED BOOK DETAILS</legend>
	<form action="" method="post">
		Enter UPRN<input type="text" name="uprn" class="input">
		Enter ACCESSION No<input type="text" name="acc" class="input">
		<button type="submit" class="button" name="sub">SUBMIT</button>
	</form>
</fieldset>

</div>

</body>
</html>