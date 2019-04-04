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
// print user list
//
printf("<br>Current users:<br>");
$users = "SELECT user_id FROM Users";

//
// $result is object containing rows of info
//
if($result = $mysqli->query($users))
{
  echo "<table>";
  while ($row = $result->fetch_assoc())
  {
    echo "<tr><td>" . $row["user_id"] . "<tr><td>";
  }
  echo "</table>";

  //free result set
  $result->free();
}

echo "<br>Username: " . $username . "<br>";

//
// close connection
//
$mysqli->close();

?>
