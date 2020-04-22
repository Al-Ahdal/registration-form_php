<?php

require('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php

if (isset($_POST['username'])){
	
	$username = $_POST['username'];

	$password = md5($_POST['pwd']);
        
	$stmt = $conn->prepare("SELECT username, password FROM register_users where username='$username' and password = '$password'");

    /* execute statement */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($user, $pass);

    /* fetch values */
    while ($stmt->fetch()) 
    {
		
    }

if($user == $username)
			{
				session_start();
				   $_SESSION['name'] = $user;
						// Redirect user to index.php
				   header("Location: index.php");
			}
			else
			{
				  $msg = "Your username or password is wrong";
			}


$stmt->close();
       
    }
		
?>

<body>

<div style="margin-top:8%" class="container">
  
    <div class="col-sm-4">
    </div>
    
  <div class="row">
    
    <div class="col-sm-4" style="background:#80ced6;">
		<?php echo $msg; ?>
      <h2>Login form</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label>Username:</label>
      
        <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
      
    </div>
    
    <div class="form-group">
      <label>Password:</label>
                
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
     
    </div>
    
    <div class="form-group">        
      
        <button style="margin-left: 40%;" type="submit" class="btn btn-default">Login</button>
     
    </div>
  </form>
  <p>Click here to <a href='register.php'>Register</a></p>
</div>
</div>
</div>

</body>
</html>
