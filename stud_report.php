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
			$html="<div><table style='border-collapse:collapse;width:50%';><caption><b>BOOKS ISSUED DURING('.$fromdate.'-and'.$todate.')AND RETURNED</b></CAPTION>";
				$html.="<tr >
					<td>SI.NO</td>
					<td>UPRN</td>
					<td>TITLE</td>
				</tr>";
				$i=1;
				while($ro=$res->fetch_assoc())
				{
				
					$html.="<tr>
					<td>".$i."</td>
					<td >".$ro['uprn']."</td>
					<td>".$ro['book_title']."</td>
				</tr>";
				$i++;


			}
			$html.="</table></div>";
			

		}
		else{
			$html = "data not found</br>";
		}

		$sql1="select * from stud_book_issue where ((issue_date between '$fro' and '$to') ) and ret_stat=0 ";
		$res1=$db->query($sql1);
		if($res1->num_rows>0)
		{
			$html.="<br><div><table style='border-collapse:collapse;width:50%';><caption><b>BOOKS ISSUED DURING('.$fromdate.'-and'.$todate.')AND NOT RETURNED</b></CAPTION>";
				$html.="<tr >
					<td>SI.NO</td>
					<td>UPRN</td>
					<td>TITLE</td>
					<td>FINE</td>
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
					<td>".$i."</td>
					<td >".$rot['uprn']."</td>
					<td>".$rot['book_title']."</td>
					<td>".$fine."</td>
				</tr>";
				$i++;


			}
			$html.="</table></div>";
			

		}
		else{
			$html.= "data not found";
			
		}

		




			$mpdf=new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$file=time().'.pdf';
			$mpdf->output($file,'I');


		}

		

	

		
	?>



</body>
</html>