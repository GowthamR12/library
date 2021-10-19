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

		if(isset($_POST["submit"]))
		{
			$email=$_POST["email"];
			$acc=$_POST["accno"];

			$date=date("Y/m/d");
			
			$jq="select books.title,bookacc.accno,bookacc.isissued from books inner join bookacc on books.bid=bookacc.bfid where accno='$acc'";
			$rp=$db->query($jq);
			if($rp->num_rows>0)
			{

				$rop=$rp->fetch_assoc();
				$title=$rop["title"];
				if($rop["isissued"]=='no')
				{
					$sqla="select * from faculty where email='$email'";
					$res=$db->query($sqla);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$fid=$ro["fid"];
							$sql="insert into fac_book_issue(book_acc,fid,issue_date,email,book_title)  values('$acc','$fid','$date','$email','$title')";
							if($rest=$db->query($sql))
							{
								echo "success with fac_issue";
								$sq="update bookacc set isissued='yes' where accno='$acc'";
								if($re=$db->query($sq))
								{
									header('Location:fac_book_issue.php');
								}
								else
								{
									echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED TO UPDATE ISSUE </span></center>";
								}
							}
							else
							{
								echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FAILED TO ISSUE TO THIS FACULTY</span></center>";
							}	
					} 
					else{
						echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>FACULTY IS NOT REGISTERED</span></center>";
					}
				

				}
				else
				{
					echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>Already Issued</span></center>";

				}
			}
			else{
				echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>ENTERED BOOK IS NOT AVAILABLE</span></center>";
			}
		}
		
		
			
				

	?>
<center><div class="fac">
<fieldset>
	<legend>RECORD RETURNED BOOK DETAILS</legend>
	<form action="" method="post">
		ENTER EMAIL<input type="email" name="email" class="input">
		ENTER ACCESSION NO<input type="text" name="accno" class="input">
		<button type="submit" name="submit" class="button">SUBMIT</button>
	</form>
</fieldset>
</div>
</body>
</html>