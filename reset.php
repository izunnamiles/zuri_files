<?php 
session_start();
if(isset($_SESSION['reset'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Reset</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

<form action="regform.php" method="post">
<label>New Password</label>
<input type="text" name="password"><br>
<label>Confirm Password</label>
<input type="text" name="con_password"><br>
<button type="submit" name="reset">update</button><br><br>
</form>
</body>
</html>
 <?php
}else{
    echo "Access Denied: Unauthorised";
}

?>