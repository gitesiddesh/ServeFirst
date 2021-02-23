<?php 
	include 'phpConn.php';
	if(isset($_POST['regno'])){
		$status=$_POST['status'];
		$bill = $_POST['bill'];
		$regno = $_POST['regno'];
		$q="update service set status='".$status."', billamount=".$bill." where regno=".$regno.";";
	//error_log($q);
		$updateQuery = pg_query($conn,$q);
		//echo $updateQuery;
		echo "<script>location.href='acceptServiceRequest.php';</script>";
	}
?>