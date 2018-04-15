<?php
require 'db.php';
$bookingsId=-1;

if(isset($_REQUEST['guestKey']) && isset($_REQUEST['hotelsId'])){
	$conn = null;
	try{
		$conn = getConnection();
		if($conn != null){
			$sql = "insert into bookings (`guest_key`, `hotels_id`) values (:key, :id)";
			$stmt = $conn->prepare($sql);
			$params = array(':key'=>$_REQUEST['guestKey'], ':id'=>$_REQUEST['hotelsId']);			 
			$stmt->execute($params);
			$bookingsId = $conn->lastInsertId();			
		}else{
			die('could not open database connection');
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}finally{
		$conn=null;
	}	
}else{
	die('invalid input parameters');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
 	<div class='alert alert-success' style="<?php echo $bookingsId>0 ? '' : 'display:none' ?>">
		Your booking was successfully saved.
	</div>
	<div class='alert alert-danger' style="<?php echo $bookingsId<0 ? '' : 'display:none' ?>">
		Could not make your booking.
	</div>
</div>

</body>
</html>
