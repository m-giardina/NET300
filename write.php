<?php
require("./_connect.php");

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);

if($db->connect_errno) {
    // if there is a connection error
    echo "Failed to connect to db: (" . $db->connect_errno. ") " . $db->connect_error;
}

//Get user-input from page
$username=substr($_GET["username"], 0, 32);
$text=substr($_GET["text"], 0, 128);

//escape inputs to lessen SQLI risk

$nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username with 32 char limit
$textEscaped = htmlentities(mysqli_real_escape_string($db,$text)); //escape text with 128 char limit

//create query
$query="INSERT INTO chat (username, text) VALUES ('$nameEscaped', '$textEscaped')";
//execute query
if ($db->real_query($query)) {
    //if query succeeds
    echo "Wrote message to db";
}else{
    //query failed
    echo "Something went wrong";
    echo $db_errorno;
}

$db->close();
?>

