<?php
session_start();
require 'db.php';
if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
	$user = checkAdminLogin();
	
	if($user == null){
		die('Invalid username/password');
	}
	$_SESSION['authorized']=true;
}else{
	die('parameters not set.');
}

$bookings = getAllBookings();
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
  <link rel='stylesheet' href="hotels.css"/>
  <script src='adminLogin.js'></script>
	<style>
		td,th{
			font-size: 16px;
		}
	</style>
</head>
<body>

<div class="container">
 	<div class='text-center'>
		<h1>Welcome Admin</h1>
	</div>
	
	<div id='hotels'>
		<table class='table table-hover'>
			<thead>		
				<th>Hotel Name</th>
				<th>Guest Name</th>
				<th>Booked at</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					foreach($bookings as $booking){
						$bookingsId = $booking['bookingsId'];
						$checked = $booking['checked'];
						$checked = intval($checked)>0 ? "checked" : "";
						$cb = "<div class='form-check'>
								<label class='form-check-label '>
								  <input type='checkbox' class='checkBooking form-check-input'  
								  data-bookingsId=$bookingsId $checked>
								  Checked
								</label>
							  </div>";
						echo "<tr>";
						echo "<td>".$booking['hotel name']."</td>";
						echo "<td>".$booking['guest']."</td>";
						echo "<td>".$booking['Booked at']."</td>";
						echo "<td>$cb</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>

</body>
</html>
