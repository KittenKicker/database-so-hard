<!DOCTYPE html>
<html>
<head>
  <title>
    Proposal Form
  </title>
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<form id="myForm" action="proposaladd.php" method="POST">
  <label for="title">Title:</label> <input id="title" name="title" type="text">
  <br/>
  <label for="description">Description:</label> <textarea name="description" id="description"></textarea>
  <br/>
<button type="submit">Submit</button>
</form>
</body>
</html>