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

  $sql = "UPDATE proposals AS P SET status = '" . $_POST["status"] . "' WHERE P.id = " . $_GET["proposal"];
  
  echo $sql;
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
<br/><a href="index.html"><button>Go back to list</button></a>
</body>
</html>
