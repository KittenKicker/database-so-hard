<?php
session_start();

$mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");
$result = $mysqli->query("SELECT U.id, U.fname, U.lname FROM users U WHERE U.email = '" . $_SESSION["email"] . "'");
if (!$result)
{
    throw new Exception("Database Error [{$result->database->errno}] {$result->database->error}");
}
else 
{
	$row = $result->fetch_assoc();
	$_SESSION["uid"] = $row["id"];
	$_SESSION["fname"] = $row["fname"];
	$_SESSION["lname"] = $row["lname"];
	$_SESSION["email"] = $_POST["email"];
	// $_SESSION["user_record"] = $row;
}

header("Location: http://webtech.kettering.edu/~lind6441/proposal-database-project/");
?>