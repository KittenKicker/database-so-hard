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
    $result = $mysqli->query("SELECT * AS comment FROM comments");
    if (!$result)
    {
        throw new Exception("Database Error [{$result->database->errno}] {$result->database->error}");
    }
    else 
    {
    	$row = $result->fetch_assoc();
    	echo htmlentities($row['comment']);
    }
    
	// phpinfo();
?>
</pre>
</body>
</html>
