<?php 
$db = new mysqli("localhost","root","","library");
if(!$db)
{
	echo "failed";
}
	$date=date("Y/m/d");

	$chstd="select * from student where isexp='active'";
	$reschstd=$db->query($chstd);
	if($reschstd->num_rows>0)
	{
		while($rochstd=$reschstd->fetch_assoc())
		{
				$studentid=$rochstd["sid"];
				$just="select DATEDIFF(exprydate,crtdate) as diff from student where sid='$studentid'";
				$justres=$db->query($just);
				if($justres->num_rows>0)
				{
					$justro=$justres->fetch_assoc();
					$diff=$justro["diff"];
					if($diff<=0)
					{
						$upchstd="update student set isexp='expired' where sid='$studentid'";
						if($db->query($upchstd))
						{
							echo "expired";
						}
						else
						{
							echo "something went wrong";
						}
					}
				

				}
				
				
			}
		}

	$mailup="update stud_book_issue set maildiff=datediff(actual,issue_date) where ret_stat=0 and mailsent=0";
		$db->query($mailup);
		$mailsql="select * from stud_book_issue where maildiff=0 and mailsent=0";
		$remailsql=$db->query($mailsql);
		if($remailsql->num_rows>0)
		{
			while($romailst=$remailsql->fetch_assoc())
			{
				$mailsid=$romailst["sid"];
				$mailbookac=$romailst["book_acc"];
				$mailsbid=$romailst["sbid"];
				$mailst="select email from student where sid='$mailsid'";
				$resmailst=$db->query($mailst);
				if($resmailst->num_rows>0)
				{
					
					{
					$romailst=$resmailst->fetch_assoc();
					 $towards       = $romailst["email"];
                $subjectward  = 'Book Due';
                $messageward  = "<p>Your book-".$mailbookac." Final Return date Ends Today, Kindly Return your book to avoid Fine</p>";
                $headersward  = 'From: gowthamraghunathan@gmail.com' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8';


                if(mail($towards, $subjectward, $messageward, $headersward))
                {
                	$mailupdse="update stud_book_issue set mailsent=1 where sbid='$mailsbid' and mailsent=0";
                	$db->query($mailupdse);
    
                    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>EMAIL SENT</span></center>";
                }
                else
                {
                    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>EMAIL DID NOT SENT</span></center>";
                }
                
            }
           }
          }

		}

			$mailupfa="update fac_book_issue set maildiff=datediff(actual,issue_date) where ret_stat=0 and mailsent=0";
		$db->query($mailupfa);
		$mailsqlfa="select * from fac_book_issue where maildiff=0 and mailsent=0";
		$remailsqfa=$db->query($mailsqlfa);
		if($remailsqfa->num_rows>0)
		{
			while($romailstfa=$remailsqfa->fetch_assoc())
			{
				$mailsidfa=$romailstfa["fid"];
				$mailbookacfa=$romailstfa["book_acc"];
				$mailsbidfa=$romailstfa["fbid"];
				$mailstfa="select email from faculty where fid='$mailsidfa'";
				$resmailstfa=$db->query($mailstfa);
				if($resmailstfa->num_rows>0)
				{$i=0;
					while($i<1)
					{
					$romailstfa=$resmailstfa->fetch_assoc();
					 $towardsfa  = $romailstfa["email"];
                $subjectwardfa  = 'Book Due';
                $messagewardfa  = "<p>Your book-".$mailbookacfa." Final Return date Ends Today, Kindly Return your book to avoid Fine</p>";
                $headerswardfa  = 'From: gowthamraghunathan@gmail.com' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-type: text/html; charset=utf-8';


                if(mail($towardsfa, $subjectwardfa, $messagewardfa, $headerswardfa))
                {
                	$mailupdsefa="update fac_book_issue set mailsent=1 where fbid='$mailsbidfa' and mailsent=0";
                	$db->query($mailupdsefa);
    
                    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>EMAIL SENT</span></center>";
                }
                else
                {
                    echo "<center><span style='  padding: 10px;background-color:black;opacity:0.8;position:relative;left: 10px;display:inline-block;color:white;'>EMAIL DID NOT SENT</span></center>";
                }
                $i++;
            }
           }
          }

		}


		





	

	

			



	


?>
