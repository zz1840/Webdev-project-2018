<?php

$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
if (!empty($name) || !empty($email) || !empty($password)) {
    $host = "websys3.stern.nyu.edu";
    $dbUsername = "websysF187";
    $dbPassword = "websysF187!!";
    $dbname = "websysF187";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    // echo $conn;
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From login_details Where email = ? Limit 1";
     $INSERT = "INSERT Into login_details (name, email, password) values(?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $name, $email, $password);
      $stmt->execute();
      session_start();
      $_SESSION['current_email'] = $email;
      echo "New record inserted sucessfully";
      header("Location: Login_index.html");
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>
