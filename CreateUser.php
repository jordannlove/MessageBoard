
<?php

//
//access the global array called $_POST to get the values from the text fields
//
$username = $_POST["name"];
$blogPost = $_POST["blog"];

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
  $taken = false;
  //fetch associative array
  while($row = $result->fetch_assoc())
  {
    //if username exists
    if($row["user_id"] == $username)
    {
      $taken = true;
    }
  }
  //if post is empty
  if($blogPost == "")
  {
    printf("Text box must not be empty.");
  }
  //if info is valid, store in database
  else if ($taken == false)
  {
    $q1 = "INSERT INTO Posts (post_id, content, author_id) VALUES ('NULL', '$blogPost', '$username')";
    //query to check if actually stored
    if($mysqli->query($q1) === false)
    {
      echo "Uh-oh, there was an error in publishing your post.";
    }
    else
    {
      echo "Posted! <br>";
    }
  }
  //if $taken is true, then username is taken
  else
  {
    printf("That username is already in use.");
  }
  //free result set
  $result->free();
}

echo "Username: " . $username . "<br>";
echo "Post: " . $blogPost . "<br>";

//
// close connection
//
$mysqli->close();

?>
