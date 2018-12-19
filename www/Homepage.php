<?php
  ini_set('display_errors', 1);
  require 'login.php';
  session_start();
  $username = $_SESSION['current_email'];
;
  $db = mysqli_connect("websys3.stern.nyu.edu", "websysF187", "websysF187!!", "websysF187");

  if($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT name FROM login_details WHERE email = '$username' LIMIT 1";
    // $sql = "SELECT * FROM login_details WHERE email = '$myusername' and password = '$mypassword'";
    $stmt = $db -> prepare($sql);
    $stmt -> execute();
    // $result = mysqli_query($db,$sql);
    $result_set = $stmt -> get_result();
    $result = $result_set -> fetch_all();
    if (!$result) {
      printf("Error: %s\n", mysqli_error($db));
      exit();
    }
    print_r($result);
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // if(isset($active)){
    //   $active = $row['active'];
    // }

    // while($row) {
    //   echo json_encode($row);
    // }
    // printf((string)$result);
    // $stmt -> free
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $active = $row['active'];
    // if (!$check1_res) {
    //   printf("Error: %s\n", mysqli_error($con));
    //   exit();
    // }
    // $stmt->close();
    $db->close();
    echo json_encode($result);
    // $stmt->store_result();
    // $count = mysqli_num_rows($result);
  }


?>
