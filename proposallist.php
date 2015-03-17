<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Proposal Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>
            Proposals
        </h1>
        <!-- <hr/> -->
        <br/>
        <ul class="list-group">
        <?php

        	error_reporting(E_ALL);
        	ini_set('display_errors', 1);

            $mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");
            $result = $mysqli->query("SELECT P.id, P.date_created, P.title, U.fname, U.lname FROM proposals AS P INNER JOIN users AS U ON U.id = P.posted_by_id ORDER BY P.date_created DESC");
            if (!$result)
            {
                throw new Exception("Database Error [{$result->database->errno}] {$result->database->error}");
            }
            else 
            {
              while($row = $result->fetch_assoc())
              {
            	 echo "<li class='list-group-item'><a href='index.php?proposal=" . $row["id"] . "'><strong>Proposal Title: </strong>" . $row["title"] . "</a><br/><strong>Submitted By: </strong>" . $row["fname"] . " " . $row["lname"] . "<br/><strong>Date: </strong>" . $row["date_created"] . "</li>";
              }
            }
            
        	// phpinfo();
        ?>
        </ul>
    </div>
</div>
</body>
</html>
