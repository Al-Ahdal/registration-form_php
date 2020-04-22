<?php

/* database configuration */

$servername = 'localhost';
$username = 'USERNAME';
$password = 'PASSWORD';
$db = 'db_reg';

$conn = mysqli_connect($servername,$username,$password,$db);

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$msg = '';
?>
