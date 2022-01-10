<?php
include "database.php";
require('vendor/autoload.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpot" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<?php



		if(isset($_POST["create"]))
		{
		$fromdate=$_POST["from"];
		function reformatDate($fromdate, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
    	$date_aux = date_create_from_format($from_format, $fromdate);
    	return date_format(new DateTime($date_aux),$to_format);
		}
		$fro=reformatDate($fromdate);
		$todate=$_POST["to"];
		function reformatDate2($todate, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
    	$date_aux1 = date_create_from_format($from_format, $todate);
    	return date_format(new DateTime($date_aux1),$to_format);
    	}
		$to=reformatDate2($todate);
		
		
		

		$sql="select * from stud_book_issue where ((issue_date between '$fro' and '$to') ) and ret_stat=1 ";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			$html="<div><table border='1' style='border-collapse:collapse;width:100%';><caption><b>BOOKS ISSUED DURING('.$fromdate.'-and'.$todate.')AND RETURNED</b></CAPTION>";
				$html.="<tr>
					<th>SI.NO</th>
					<th>UPRN</th>
					<th>NAME</th>
					<th>TITLE</th>
					<th>SFA</th>
				</tr>";
				$i=1;
				while($ro=$res->fetch_assoc())
				{
				
					$html.="<tr>
					<td style='text-align:center'>".$i."</td>
					<td style='text-align:center'>".$ro['uprn']."</td>
					<td style='text-align:center'>".$ro['stname']."</td>
					<td style='text-align:center'>".$ro['book_title']."</td>
					<td style='text-align:center'>".$ro['book_acc']."</td>
				</tr>";
				$i++;


			}
			$html.="</table></div>";
			

		}
		else{
			$html = "No returned Books</br>";
		}


		$html.="<br>-----------------------------------------------------------------------------------------------------------------------------------------------------";

		$sql1="select * from stud_book_issue where ((issue_date between '$fro' and '$to') ) and ret_stat=0 ";
		$res1=$db->query($sql1);
		if($res1->num_rows>0)
		{
			$html.="<br><div><table border='1' style='border-collapse:collapse;width:100%';><caption><b>BOOKS ISSUED DURING('.$fromdate.'-and'.$todate.')AND NOT RETURNED</b></CAPTION>";
				$html.="<tr>
					<th>SI.NO</th>
					<th>UPRN</th>
					<th>NAME</th>
					<th>TITLE</th>
					<th>SFA.NO</th>
					<th>FINE</th>
				</tr>";
				$i=1;
				while($rot=$res1->fetch_assoc())
				{
					if($rot["maildiff"]>=0)
					{
						$fine=0;
					}
					else
					{
						$fine=abs($rot["maildiff"]);
					}
				
					$html.="<tr>
					<td style='text-align:center'>".$i."</td>
					<td style='text-align:center'>".$rot['uprn']."</td>
					<td style='text-align:center'>".$rot['stname']."</td>
					<td style='text-align:center'>".$rot['book_title']."</td>
					<td style='text-align:center'>".$rot['book_acc']."</td>
					<td style='text-align:center'>".$fine."</td>
				</tr>";
				$i++;


			}
			$html.="</table></div>";
			

		}
		else{
			$html.= "data not found";
			
		}

		$html.="<br>-----------------------------------------------------------------------------------------------------------------------------------------------------";

		$sql2="select fine_status from stud_book_issue ((issue_date between '$fro' and '$to'))";
		$res2=$db->query($sql);
		$sum=0;
		if($res2->num_rows>0)
		{
			while($ro2=$res2->fetch_assoc())
			{
				$sum+=$ro2['fine_status'];
			}
			$html.="<br><br><p>Total Fine Collected</span><br><p>".$sum."</p>";
		}
		else{
			$html.="No Fine";
		}

		

		


			$mpdf=new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$file=time().'.pdf';
			$mpdf->output($file,'I');


		}

		

	

		
	?>



</body>
</html>