<!DOCTYPE html>
<html>
<head>
  <title>Proposal Form</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  $mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");

  $sql = "INSERT INTO proposals (title, description, posted_by_id) VALUES ('" . $_POST["title"] ."', '" . $_POST["description"] . "', 1)";
  if($mysqli->query($sql) === TRUE)
  {
     echo "Record added!";
  }
  else
  {
     echo "Record not added...";
  }
  $mysqli->close();

?>
<br/><a href="proposalform.php">Go back to form</a>
</body>
</html>
