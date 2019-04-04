
<?php
&mysqli = new mysqli("database_URL", "j863l378", "ethai3k", "j863l378");

//
// check connection
//
if ($mysqli->connect_errno)
{
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//access the global array called $_POST to get the values from the text fields
$name = $_POST["name"];
$email = $_POST["email"];

echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";

//
// close connection
//
$mysqli->close();

?>
