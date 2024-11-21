<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <?php
  //conect to the datbase

  require_once('database.php');
  include "header.php";
  $db = db_connect();
  //access URL parameter
  if (!isset($_GET['id'])) { //check if we get the id
    header("Location:  index.php");
  }
  $thread_id = $_GET['id'];

  //prepare your query
  $sql = "SELECT * FROM THREADS WHERE thread_id = '$thread_id'";

  $result_set = mysqli_query($db, $sql);

  $result = mysqli_fetch_assoc($result_set);

  $sql2 = "SELECT * FROM COMMENTS WHERE thread_id = '$thread_id' ";
  $sql2 .= "ORDER BY comment_id DESC";

  $result_set2 = mysqli_query($db, $sql2);

  //$result2 = mysqli_fetch_assoc($result_set2);

  ?>

  <!-- display the employee data -->
  <p> <?php echo $result['message']; ?></p>

  <form action="post-reply.php" method="post">

    <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>">

    <label for="reply">Write your reply here</label><br>
    <textarea id="reply" name=reply rows="10" cols="45" placeholder="Post your reply"></textarea>

    <button class="input-size" id="reply-post" type="submit">Reply</button>
  </form>

  <?php while ($results2 = mysqli_fetch_assoc($result_set2)) { ?>
    <p> <?php echo $results2['message']; ?> </p>
    <p> <?php echo $results2['reply_time']; ?> </p><?php } ?>
  <!-- <div id="content">

    <a class="back-link" href="index.php"> Back to List</a>

    <div class="page show">

      <h1> <?php echo $result['name']; ?></h1>

      <div class="attributes">
        <dl>
          <dt>Employee Name</dt>
          <dd><?php echo $result['name']; ?></dd>
        </dl>
        <dl>
          <dt>Employee address</dt>
          <dd><?php echo $result['address']; ?></dd>
        </dl>
        <dl>
          <dt>Employee salary</dt>
          <dd><?php echo $result['salary']; ?></dd>
        </dl>
        <dl>

      </div>


    </div>

  </div> -->

  <?php include 'footer.php'; ?>
</body>

</html>