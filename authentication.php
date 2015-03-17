<?php
session_start();

$mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");
$result = $mysqli->query("SELECT U.id, U.fname, U.lname, UP.permission_id FROM users U LEFT OUTER JOIN user_permissions AS UP ON UP.user_id = U.id AND UP.permission_id = 2 WHERE U.email = '" . $_POST["email"] . "'");
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
  $_SESSION["statusupdate"] = $row["permission_id"];
	// $_SESSION["user_record"] = $row;
}

header("Location: http://webtech.kettering.edu/~holl4332/databaseproject/");
?>