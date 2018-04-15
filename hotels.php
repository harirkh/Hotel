<?php
include 'db.php';
$guest = null;
$conn = null;
$key='';
if(isset($_REQUEST['key'])){
	$key = $_REQUEST['key'];
	try{		
		$conn = getConnection();
		if($conn !=null){
			$sql = "select * from guests where `key` = :key";
			$stmt = $conn->prepare($sql);
			$r = $stmt->execute(array(':key'=>$key));
			if($r){
				$guest = $stmt->fetch();				
			}else{
				die('could not fetch the guest');
			}			
		}else{
			die('could not open connection');
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}finally{
		$conn = null;
	}
}else{
	die('Key not specified');
}

$hotels = getAllHotels();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotels</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href="hotels.css"/>
  <script src='hotels.js'></script>
</head>
<body>

<div class="container">
 	<div class='text-center'>
		<h1>Welcome <?php echo $guest['firstname']?></h1>
	</div>
	
	<div id='hotels'>
		<table class='table'>
			<thead>				
			</thead>
			<tbody>
				<?php
					foreach($hotels as $hotel){
						echo "<tr>";
						echo "<td><img src='".$hotel['picture']."' style='width:256px;'/></td>";
						echo "<td><h1>".$hotel['name']."</h1><p>".$hotel['description']."<p></td>";
						echo "<td><button class='book btn btn-primary btn-lg' data-guest_key='$key'
							data-hotels_id=".$hotel['id'].">Book</button></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>

</body>
</html>

