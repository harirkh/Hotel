<?php
include_once('db.php');
        
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$result=array('guestId'=>-1);
try{
	$conn = getConnection();
	if($conn==null){
		echo "connection is null";
	}else{
		$sql = "INSERT 
			INTO 
				guests 
			(`firstname`, `lastname`, `email`, `password`, `key`) 
		  VALUES 
		  	( :firstname, :lastname, :email, :password, :key)";
		
		$stmt = $conn->prepare($sql);
		$key = uniqid();
		$r = $stmt->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, 
							 ':email'=>$email, ':password'=>$password, ':key'=>$key));
		$guestId = $conn->lastInsertId();
		$result=array('guestId'=>$guestId, 'key'=>$key);		 
	}
}catch(PDOException $e){
    //echo "Failed to save data";
	error_log($e->getMessage());
}finally{
	$conn = null;
}
header('Content-Type: application/json');
echo json_encode($result);

?>