<!DOCTYPE html>
<html>
<head>
  <title>
    Proposal Form
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</head>
<body>
<form id="myform" action="proposaladd.php" method="post">
  <div class="container">
    <div class="row">
      <h1> Submit your Proposal </h1>
      <br/>
      <div class="form-group">
        <label for="title">Title:</label> <input class="form-control" id="title" name="title" type="text">
      </div>
      <div class="form-group">
        <label for="description">Description:</label> <textarea class="form-control" name="description" id="description"></textarea>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</body>
</html>