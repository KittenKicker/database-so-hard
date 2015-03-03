<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Proposal Database</title>
</head>
<body>
<pre>
<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

    $mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");
    $result = $mysqli->query("SELECT * FROM proposals");
    if (!$result)
    {
        throw new Exception("Database Error [{$result->database->errno}] {$result->database->error}");
    }
    else 
    {
      while($row = $result->fetch_assoc())
      {
    	 echo $row["title"] . "<br/>";
      }
    }
    
	// phpinfo();
?>
</pre>
</body>
</html>
