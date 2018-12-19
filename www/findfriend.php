

<?php


$link = mysqli_connect("websys3.stern.nyu.edu", "websysF187", "websysF187!!", "websysF187");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$food = mysqli_real_escape_string($link, $_REQUEST['food']);
$time = mysqli_real_escape_string($link, $_REQUEST['time']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$location = mysqli_real_escape_string($link, $_REQUEST['location']);


// Attempt insert query execution
$sql = "INSERT INTO user_food_details (email, food, time, price, location) VALUES ('$email', '$food', '$time', '$price', '$location')";
if(mysqli_query($link, $sql)){
    header("Location: FindFriend_Index.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
