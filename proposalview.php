<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <?php session_start(); ?>
  <title>
    Proposal Viewer
  </title>
</head>
<body>
<?php
error_reporting(E_ALL);
          ini_set('display_errors', 1);
  $mysqli = new mysqli("localhost", "lind6441", "kett6441", "lind6441_group");
  $sql = "SELECT P.title, P.description, P.category, P.date_created, U.fname, U.lname, P.status FROM proposals AS P INNER JOIN users AS U ON U.id=P.posted_by_id WHERE P.id=". $_GET["proposal"];
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
?>
  <form id="myform" action="proposaledit.php?proposal=<?php echo $_GET["proposal"]?>" method="post">
  <div class="container">
    <div class="row">
      <h1> <?php echo $row["title"] ?></h1>
      <br/>
      <div class="form-group">
        <label for="description">Description: </label><textarea name="description" id="description" readonly class="form-control"><?php echo $row["description"]?></textarea>
      </div>
      <div class="form-group">
        <label for="category">Category: </label><input class="form-control" readonly id="category" name="category" type="text" value="<?php echo $row["category"] ?>">
      </div>
      <div class="form-group">
        <label for="postedby">Submitted By: </label><input class="form-control" readonly id="postedby" name="postedby" type="text" value="<?php echo $row["fname"] . " " . $row["lname"]?>">
      </div>
      <div class="form-group">
        <label for="date">Date Submitted: </label><input class="form-control" readonly type="date" id="date" name="date" value="<?php echo $row["date_created"]?>">
      </div>
      <!--TODO: Update this to use permission for editing" -->
      <div class="form-group">
        <label for="status">Status :</label>
        <select class="form-control" id="status" name="status" <?php if($_SESSION["statusupdate"] != 2) { echo "readonly";}?>>
          <option <?php if($row["status"] == "Pending"){ echo "checked"; }?> value="Pending">Pending</option>
          <option <?php if($row["status"] == "Approved"){ echo "checked"; }?> value="Approved">Approved</option>
          <option <?php if($row["status"] == "Denied"){ echo "checked"; }?> value="Denied">Denied</option>
        </select>
      </div>
      <?php
      if($_SESSION["statusupdate"] == 2)
      {
        echo "<button type='submit' class='btn btn-default'>Update Status</button>";
      }
      ?>
      <!--End Todo -->
    </div>
  </div>
</form>
<br/>
<div class="container">
  <div class="row">
    <h3>Comments</h3>
    <hr>
    <form id="comments" method="POST">
      <div class="form-group">
      <label for="comment">Write Comment: </label>
      <textarea name="comment" id="comment" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-default">Add Comment</button>

    </form>
    <br/>
    <br/>
    <ul class="list-group">
      <?php 
      error_reporting(E_ALL);
        ini_set('display_errors', 1);
        if(isset($_SESSION["uid"]))
        {
          if(isset($_POST["comment"]))
          {
            $sql = "INSERT INTO comments (proposal_id, user_id, comment_body) VALUES (" . $_GET["proposal"] . "," . $_SESSION["uid"] . ",'" . $_POST["comment"] . "')";
          }
          $mysqli->query($sql);
        }
        else
        {
          echo "please sign in<br/>";
        }
        
        $sql = "SELECT U.fname, U.lname, C.comment_body, C.date_created FROM comments AS C INNER JOIN proposals AS P ON P.id = C.proposal_id INNER JOIN users AS U ON U.id = C.user_id WHERE C.proposal_id = " . $_GET["proposal"] . " ORDER BY C.date_created DESC";

        $result = $mysqli->query($sql);

        while($row = $result->fetch_assoc())
        {
          echo "<li class='list-group-item'>" . $row["comment_body"] . "<br/><small>" . $row["fname"] . " " . $row["lname"] . " " . $row["date_created"] . "</small></li>";
        }
      ?>
    </ul>
  </div>
</div>
</body>
</html>