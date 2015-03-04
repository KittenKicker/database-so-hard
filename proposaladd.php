<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  $mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");

  $sql = "INSERT INTO proposals (title, description, posted_by_id) VALUES ('" . $_GET["title"] ."', '" . $_GET["description"] . "', 1)";
  if($mysqli->query($sql) === TRUE)
  {
     echo "Record added...use the back button since we haven't done anything good yet";
  }
  // else
  // {
  //   echo "record not added...oh well..."
  // }
  // $mysqli->close();
?>
</body>
</html>
