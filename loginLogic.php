<?php
session_start();
echo '<meta charset="UTF-8">';
if(!isset($_SESSION['isLogin'])){
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    //echo "<p>Logged in as $email.</p>";
    $_SESSION['isLogin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['objId'] = $_POST['objId'];
    $_SESSION['userType'] = $_POST['userType'];
    $_SESSION['image'] = $_POST['imagine'];
    if($_POST['userType'] == "normal"){
      //echo $_SESSION['image'];
      header("Location: Home");
    }else if($_POST['userType'] == "admin"){
      header("Location: Admin");
    }
  }else{
    header("Location: Login");
    exit();
  }
}else{
  if($_SESSION['userType'] == "normal"){
    //echo "<p>I am already logged in</p>";
    header("Location: Home");
  }else if($_SESSION['userType'] == "admin"){
    header("Location: Admin");
  }
}
?>
