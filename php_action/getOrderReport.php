<?php
@ob_start();
session_start();
 
 require_once 'db_connect.php';
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");
	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
    $facility = $_POST['facility1'];
    $transfer = $_POST['transfer'];
	

    if ( $transfer == "Transferred In") 
    {
    	$sql = "SELECT * FROM `transfer_in` WHERE Date_transferred_in >= '$start_date' AND Date_transferred_in <= '$end_date' and Facility_transferred_in ='$facility'";
    	$query = $conn->query($sql);
    	 $countClient = $query->num_rows;
    $table = '
	     <h4><center><b>CLINICAL REFERRAL SYSTEM</b></center></h4>
	     <h4><center>Report for '.$facility.' of the Transferred In Clients</center></h4> 
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th colspan="5"><center>Transferred In Clients</center></th>
            <th colspan="3"><center>Contact Person</center></th>
			</tr>
		<tr>
            <th>Date Transferred In</th>
			<th>Date of Birth</th>
			<th>Gender</th>
			<th>CCC No.</th>
			<th>Phone Number</th>
			<th>Full name</th>
			<th>Designation</th>
			<th>Phone Number</th>
			<th>Comment</th>
		</tr>
		<tr>';
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['Date_transferred_in'].'</center></td>
				<td><center>'.$result['Date_of_Birth'].'</center></td>
				<td><center>'.$result['Gender'].'</center></td>
				<td><center>'.$result['CCC/Hosp_No'].'</center></td>
				<td><center>'.$result['phone_number'].'</center></td>
				<td><center>'.$result['Fullname'].'</center></td>
				<td><center>'.$result['Designation'].'</center></td>
				<td><center>'.$result['mobile_number'].'</center></td>
			    <td><center>'.$result['Additional_comment'].'</center></td>
			</tr>';	
		}
		$table .= '
		
	</table><br><br>
	  <h4><center>Total Clients: <b> '.$countClient.'</b></center><h4>
	';	

	echo $table;

    }

    	# code...
    elseif ($transfer == "Transferred Out") {
    	# code...
    	$sql = "SELECT * FROM `transfer_out` WHERE Date_transferred_out >= '$start_date' AND Date_transferred_out <= '$end_date' and Facility_transferred_out ='$facility'";
    	$query = $conn->query($sql);
    	 $countClient = $query->num_rows;
    $table = '
	     <h4><center><b>CLINICAL REFERRAL SYSTEM</b></center></h4>
	     <h4><center>Report for '.$facility.' of the Transferred Out Clients</center></h4> 
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th colspan="5"><center>Transferred Out Clients</center></th>
            <th colspan="3"><center>Contact Person</center></th>
			</tr>
		<tr>
            <th>Date Transferred Out</th>
			<th>Date of Birth</th>
			<th>Gender</th>
			<th>CCC No.</th>
			<th>Phone Number</th>
			<th>Full name</th>
			<th>Designation</th>
			<th>Phone Number</th>
			<th>Comment</th>
		</tr>
		<tr>';
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['Date_transferred_out'].'</center></td>
				<td><center>'.$result['Date_of_Birth'].'</center></td>
				<td><center>'.$result['Gender'].'</center></td>
				<td><center>'.$result['CCC/Hosp_No'].'</center></td>
				<td><center>'.$result['phone_number'].'</center></td>
				<td><center>'.$result['Fullname'].'</center></td>
				<td><center>'.$result['Designation'].'</center></td>
				<td><center>'.$result['mobile_number'].'</center></td>
				<td><center>'.$result['Additional_comment'].'</center></td>
			</tr>';	
		}
		$table .= '
		
	</table><br><br>
	  <h4><center>Total Clients: <b> '.$countClient.'</b></center><h4>
	';	

	echo $table;
    }


}
	
?>