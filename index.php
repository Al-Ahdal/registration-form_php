<?php

require("session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div style="margin-top:10%" class="container">
    
  <div align="center" class="row">
    
    <div class="col-sm-12" style="background:#80ced6;">

<h2> <p>Welcome <?php echo $_SESSION['name']; ?>!</p></h2>
<h3></h3><p>thank you for Login</p></h3>
<a href="logout.php">Logout</a>
</div>
</div>
</div>
</body>
</html>
