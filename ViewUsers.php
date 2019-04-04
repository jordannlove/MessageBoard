<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "j863l378", "eithai3k", "j863l378");

//
// check connection
//
if ($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//
// obtains user_id from database
//
$query = "SELECT user_id FROM Users";

//
// $result is object containing rows of info
//
if($result = $mysqli->query($query))
{
  //free result set
  $result->free();
}

echo "<br>Username: " . $username . "<br>";

//
// close connection
//
$mysqli->close();

?>
