<?php
session_start();

$_SESSION['adminLoggedIn']=false;
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Card</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
       
   </head>
   <body>
      <div class="container">
		 <div class='row'>
			 <div class='col-md-6 col-xs-12 col-sm-12 col-lg-4' style='margin: 0 auto;'>
         <div class="card " style='margin-top:100px'>
			 <div class="card-header"><b>Admin Login</b></div>
            <div class="card-body">
               <form class=" " id="register" action="adminLogin.php" method="POST" >
                  <div class='alert alert-success' id='loginSuccess' style="display:none;">
                     
                  </div>
                  <div class='alert alert-danger' id='loginFailure'  
					   style="display:none;">Invalid user name/password</div>
                  <div class=" ">
                     <div class="form-group  ">
                        <label for="inputName">Username:</label>
                        <input type="text" class="form-control" required id="username" placeholder="Username" name="username">
                     </div>                    
                  </div>
                  <div class=" ">                   
                     <div class="form-group  ">
                        <label for="inputPassword">Password:</label>
                        <input type="password" class="form-control" required id="inputPassword" placeholder="Password" name="password" >
                     </div>
                  </div>
                  <div class="btc">
                     <input type='submit' class="btn btn-primary btn-lg" 
                        role="button"  value='Sign in' id='submit'/>                     
                  </div>
               </form>
            </div>
			 </div>
				 </div>
         </div>
      </div>
   </body>
</html>