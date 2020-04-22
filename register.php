<?php

require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Registeration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script>

$(document).ready(function() 
{
$("#register").click(function() 
{
var name = $("#username").val();
var email = $("#email").val();
var password = $("#pwd").val();
var cpassword = $("#cnfpwd").val();
if (name == '' || email == '' || password == '' || cpassword == '') 
{
alert("Please fill all fields...!!!!!!");
$('#formID').attr('onSubmit','return false');
} 
else if ((password.length) < 8) 
{
alert("Password should atleast 8 character in length...!!!!!!");
$('#formID').attr('onSubmit','return false');
} 
else if (!(password).match(cpassword)) 
{
alert("Your passwords don't match. Try again?");
$('#formID').attr('onSubmit','return false');
}
else {
$('#formID').attr('onSubmit','return true');
}
});
});

</script>  
</head>

<?php

if (isset($_POST['username']))
{
	$statement = $conn->prepare("Select * from register_users where username = ? OR email = ?");
    $statement->bind_param( 'ss', $username , $email); 
      
	$stmt = $conn->prepare("INSERT INTO register_users (username, email, password, register_date) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $username, $email, $password, $register_date);

// set parameters and execute
	$username = $_POST['username'];
	$submitemail = $_POST['email'];
	
	// Remove all illegal characters from email
	$email = filter_var($submitemail, FILTER_SANITIZE_EMAIL);
	
	$password = md5($_POST['pwd']);
	$register_date = date("Y-m-d H:i:s");
	
// execute Select query

	$statement->execute();
	
	$statement->store_result();
	$numrows = $statement->num_rows;
	
	$statement->close();
	
	// Validate e-mail address
	if(filter_var($submitemail, FILTER_VALIDATE_EMAIL))
	{
		if($numrows == 0)
		{
			$stmt->execute();
			$stmt->close();
		}
		else
		{
			$checkuser = "Username Or Email Already Used";
		}
	} 
	else
	{
		$validate_msg = "$submitemail is Not valid email address";
	} 

        if($conn->insert_id)
        {
            $msg = "<h3>Registered successfully.</h3>";
        }
        else
        {
			$msg = "Registration Failed";
		}
       
    }
		
?>

<body>

<div style="margin-top:7%" class="container">
  
    <div class="col-sm-4">
    </div>
    
  <div class="row">
    
    <div class="col-sm-4" style="background: #80ced6;">
		<? php echo $validate_msg; echo $checkuser; 
    ?>

      <h3> ARE YOU NEW ?REGISTER </p> </h3>
  <form id="formID" action="" method="POST">
    <div class="form-group">
      <label>Username:</label>
      
        <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
      
    </div>
    <div class="form-group">
      <label>Email:</label>
               
        <input type="email" name="email" placeholder="Enter Email" id="email" class="form-control">
      
    </div>
    <div class="form-group">
      <label>Password:</label>
                
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
     
    </div>
    <div class="form-group">
      <label>Confirm Password:</label>
             
        <input type="password" class="form-control" id="cnfpwd" placeholder="Confirm password" name="confirmpwd">
      
    </div>
    <div class="form-group">        
      
        <input type="submit" name="register" id="register" value="Register" class="btn btn-default" style="margin-left: 40%;"/>
     
    </div>
  </form>
  <p> <p id="p3"></p> Click here to <a href='login.php'><p style="color:blue"> Login</p> </a></p>
</div>
</div>
</div>

</body>
</html>
