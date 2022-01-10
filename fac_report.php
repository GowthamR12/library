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
		
		
		

		$sql="select * from fac_book_issue where ((issue_date between '$fro' and '$to') ) and ret_stat=1 ";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
			$html="<div><table border='1' style='border-collapse:collapse;width:100%';><caption><b>BOOKS ISSUED DURING('.$fromdate.'-and'.$todate.')AND RETURNED</b></CAPTION>";
				$html.="<tr >
					<th>SI.NO</th>
					<th>EMAIL</th>
					<th>NAME</th>
					<th>TITLE</th>
					<th>SFA.No</th>
				</tr>";
				$i=1;
				while($ro=$res->fetch_assoc())
				{
				
					$html.="<tr>
					<td style='text-align:center'>".$i."</td>
					<td style='text-align:center'>".$ro['email']."</td>
					<td style='text-align:right'>".$ro['facname']."</td>
					<td style='text-align:center'>".$ro['book_title']."</td>
					<td style='text-align:center'>".$ro['book_acc']."</td>
				</tr>";
				$i++;


			}
			$html.="</table></div>";
			

		}
		else{
			$html = "<b>No Books are Returned</br>";
			
		}

		$html.="<br>--------------------------------------------------------------------------------------------------------------------------------------------------------";


		$sql1="select * from fac_book_issue where ((issue_date between '$fro' and '$to') ) and ret_stat=0 ";
		$res1=$db->query($sql1);
		if($res1->num_rows>0)
		{
			$html.="<br><div><table border='1' style='border-collapse:collapse;width:100%';><caption><b>BOOKS ISSUED DURING('.$fromdate.'-and'.$todate.')AND NOT RETURNED</b></CAPTION>";
				$html.="<tr >
					<th>SI.NO</th>
					<th colspan='4'>EMAIL</th>
					<th>NAME</th>
					<th>TITLE</th>
					<th>SFA.No</th>
				</tr>";
				$i=1;
				while($rot=$res1->fetch_assoc())
				{
					$html.="<tr>
					<td style='text-align:center'>".$i."</td>
					<td colspan='4' style='text-align:center'>".$rot['email']."</td>
					<td style='text-align:right'>".$rot['facname']."</td>
					<td style='text-align:center'>".$rot['book_title']."</td>
					<td style='text-align:center'>".$rot['book_acc']."</td>
				</tr>";
				$i++;
			}
			$html.="</table></div>";
		}
		else{
			$html .= "No books with faculties";
			
		}
		$mpdf=new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$file=time().'.pdf';
			$mpdf->output($file,'I');
		}
	?>
</body>
</html>