<?php

define('DB_SERVER', 'websys3.stern.nyu.edu');
define('DB_USERNAME', 'websysF187');
define('DB_PASSWORD', 'websysF187!!');
define('DB_DATABASE', 'websysF187');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// echo str($_SERVER["REQUEST_METHOD"]);

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      // echo "I am in!";
      $myusername = mysqli_real_escape_string($db,$_POST['Email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Password']);

      $sql = "SELECT * FROM login_details WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        session_start();
        $_SESSION['current_email'] = $myusername;
        echo $_SESSION['current_email'];
        $sql = "SELECT * FROM user_profile_details WHERE email = '$myusername'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        $count2 = mysqli_num_rows($result);
        if($count2 == 1){
          header("location: HomePage.html");
        }
        else if($count2 == 0){
          header("location: Personal_Information.html");
        }
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
?>
