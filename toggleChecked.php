<?php
session_start();
require 'db.php';

$conn = null;
try{
	$conn = getConnection();
	if($conn != null){
		$sql = "update bookings set checked=:checked where id=:id";
		$stmt = $conn->prepare($sql);
		$checked = $_REQUEST['ischecked'] ? 1 : -1;
		$params = array(':checked'=>$checked, ':id'=>$_REQUEST['bookingsId']);			 
		$stmt->execute($params);
		$bookingsId = $conn->lastInsertId();	
		echo "toggle successfully";
	}else{
		echo('could not open database connection');
	}
}catch(PDOException $e){
	echo $e->getMessage();
}finally{
		$conn=null;
}