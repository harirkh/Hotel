<?php
function getConnection(){
	$conn = null;
	try {
		$servername = "localhost";
		$username = "harir";
		$password = "harir";
		$port="3307";
		$dB = "store";
		$conn = new PDO("mysql:host=$servername;port=$port;dbname=$dB", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $e){
		echo "Could not open connection.";
		error_log($e->getMessage());
	}
	return $conn;
}

function checkAdminLogin(){
	$user=null;
	try{		
		$conn = getConnection();
		if($conn !=null){
			$sql = "select * from users where username=:username and password=:password";
			$stmt = $conn->prepare($sql);
			$r = $stmt->execute(array(':username'=>$_REQUEST['username'], ':password'=>$_REQUEST['password']));
			$user=$stmt->fetchAll(PDO::FETCH_NAMED);			
		}else{
			die('could not open connection');
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}finally{
		$conn = null;
	}
	return $user;
}
function getAllBookings(){
	$bookings=null;
	try{		
		$conn = getConnection();
		if($conn !=null){
			$sql = "SELECT 
    concat(firstname,' ', lastname) as guest,
    email,
    h.name as `hotel name`,
    b.id AS bookingsId,
    b.created_at AS `Booked at`, b.checked as checked
FROM
    bookings b
        JOIN
    guests g ON g.`key` = b.guest_key 
    join hotels h on h.id=b.hotels_id;";
			$stmt = $conn->prepare($sql);
			$r = $stmt->execute();
			$bookings=$stmt->fetchAll(PDO::FETCH_NAMED);			
		}else{
			die('could not open connection');
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}finally{
		$conn = null;
	}
	return $bookings;
}

function getAllHotels(){
	$hotels=null;
	try{		
		$conn = getConnection();
		if($conn !=null){
			$sql = "select * from hotels";
			$stmt = $conn->prepare($sql);
			$r = $stmt->execute();
			$hotels=$stmt->fetchAll(PDO::FETCH_NAMED);			
		}else{
			die('could not open connection');
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}finally{
		$conn = null;
	}
	return $hotels;
}