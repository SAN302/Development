<?php
	session_start();
	include 'conn.php';
	
	$obj=$_POST;
	$currentuserid=$_SESSION['id'];
	print_r($obj['buyerid']);echo "		";
	print_r($obj['item_link']);echo "		";
	print_r($currentuserid);echo "		";
	print_r($obj['solution']);
	print_r($buyerid_a_or_r);
	
	if($obj['solution']=='Accept')
	{
		$item_link=$obj['item_link'];
		$accepted=1;
		$rejected=0;
		$currentuserid=$_SESSION['id'];
		$buyerid_a_or_r=$obj['buyerid'];
		$sql="UPDATE carrier_request SET accepted='$accepted',rejected='$rejected' WHERE cr_user_id='$buyerid_a_or_r' AND cr_flightuser_id='$currentuserid' AND item_link='$item_link'";
		mysqli_query($conn,$sql);
		
		$status=0;
		$sql="select flight_date,source,destination from flight where user_id='$currentuserid' AND status='$status'";
		$query = mysqli_query($conn,$sql);
		$numrows = mysqli_num_rows($query);
		$flight_date='';
		$source='';
		$destination='';
		if($numrows>0)
		{
			while($row=mysqli_fetch_array($query))
			{
				$flight_date=$row['flight_date'];
				$source=$row['source'];
				$destination=$row['destination'];
			}
		}
		
		
		$carrier_id=$_SESSION['id'];
		$buyerid=$obj['buyerid'];
		$sql="INSERT INTO confirmation(carrier_id,buyerid,flight_date,source,destination) VALUES('$carrier_id','$buyerid','$flight_date','$source','$destination')";
		mysqli_query($conn,$sql);
		header("location: request.php");
	}
	else if($obj['solution']=='Reject')
	{
		$item_link=$obj['item_link'];
		$accepted=0;
		$rejected=1;
		//$currentuserid=$_SESSION['id'];
		$buyerid_a_or_r=$obj['buyerid'];
		$sql="UPDATE carrier_request SET accepted='$accepted',rejected='$rejected' WHERE cr_user_id='$buyerid_a_or_r' AND cr_flightuser_id='$currentuserid' AND item_link='$item_link'";
		mysqli_query($conn,$sql);
		header("location: request.php");
	}
?>