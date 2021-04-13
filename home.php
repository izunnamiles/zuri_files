<?php 
session_start();
if(!isset($_SESSION['username'])){ header('location:login.php'); die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>zuri</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<p>
Hi <?php echo $_SESSION['full_name']?>,
</p>
<p>your username is <?php echo $_SESSION['username']?></p>

<a href="logout.php">Logout</a>
</body>
</html>