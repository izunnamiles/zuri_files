<?php
session_start();

if(isset($_POST['submit_data'])){
  $fName = trim($_POST['fName']);
  $lName = trim($_POST['fName']);
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $data = array(
    'first_name'=> $fName,
    'last_name'=> $lName,
    'username'=> $username,
    'email'=> $email,
    'password'=> $password,
  );
  if(!file_exists('files/'.$username.".json")){
      $filed = file_put_contents('files/'.$username.".json",json_encode($data));
      $_SESSION['full_name'] = $fName." ".$lName;
      $_SESSION['username'] = $username;
  
      header("location:home.php");
      die();
    
  }else die("Username is already taken");

  
}

if(isset($_POST['login_data'])){
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if(file_exists('files/'.$username.".json")){
    $file = file_get_contents('files/'.$username.".json");
    $file_array = json_decode($file, true);
    $passcode = $file_array['password'];
  
    if($password == $passcode){
      $_SESSION['full_name'] = $file_array['first_name']." ".$file_array['last_name'];
      $_SESSION['username'] = $file_array['username'];
      header("location:home.php");
    }else {echo "Incorrect Password";}
  }else echo "username not found";
}

if(isset($_POST['forgot'])){
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);

  if(file_exists('files/'.$username.".json")){
    $file = file_get_contents('files/'.$username.".json");
    $file_array = json_decode($file, true);
    $mail = $file_array['email'];
  
    if($mail == $email){
      $_SESSION['reset']= $username;
      header("location:reset.php");
    }else {echo "Incorrect Email";}
  }else echo "username not found";
}
if(isset($_POST['reset'])){
  $username = $_SESSION['reset'];
  $password1 = trim($_POST['password']);
  $password2 = trim($_POST['con_password']);

  if(file_exists('files/'.$username.".json")){
    $file = file_get_contents('files/'.$username.".json");
    $file_array = json_decode($file, true);
    $file_array['password'] = $password1;   
    $file_array = json_encode($file_array);
    header("location:login.php");
   
  }else echo "username not found";
}




