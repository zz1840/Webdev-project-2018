<?php
// include 'ChromePhp.php';
// ChromePhp::log('Hello console!');
session_start();
$gender = $_POST['reggender'];
$country = $_POST['regcountry'];
$major = $_POST['regmajor'];
$regphone = $_POST['regmajor'];

$profimage = $_POST['profimg'];

$phone = $_POST['regphone'];
$email = $_SESSION['current_email'];
if (!empty($gender) && !empty($country) && !empty($major) && !empty($regphone) && !empty($profimage)) {
    $host = "websys3.stern.nyu.edu";
    $dbUsername = "websysF187";
    $dbPassword = "websysF187!!";
    $dbname = "websysF187";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $b64img = base64_encode ($profimage);
    $b64img = mysqli_real_escape_string($conn, $profimage);
    $profimage = $b64img;

    // echo strval($profimage)
    // echo $conn;
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From login_details Where email = ? Limit 1";
     $INSERT = "INSERT Into user_profile_details (email, gender, country, major, image, phone_number) values(?, ?, ?, ?, LOAD_FILE(?), ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     echo '<script>console.log("Here")</script>';
     if ($rnum == 1) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssbs", $email, $gender, $country, $major, $profimage, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";
      header("Location: HomePage.html");
     } else {
      echo "Fields cannot be empty!";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>
