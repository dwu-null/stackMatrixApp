
<?php
session_start();
require_once('database.php');
include 'header.php'; 
$db = db_connect();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Members Only</title>
</head>

<body>
    <h1>Members Only</h1>
    <?php
    // check session variable
    if (isset($_SESSION['valid_user'])) {
        echo '<p>You are logged in as ' . $_SESSION['valid_user'] . '</p>';
        echo '<p><em>Members-Only content goes here.</em></p>';
        echo '<p><a href="logout.php">Logout</a></p>';
        
    } else {
        echo '<p>You are not logged in.</p>';
        echo '<p>Only logged in members may see this page.</p>';

        header("Location: login.php");
    }
    ?>


      <div class="title">
        <h1>What's new </h1>
        <h2>Posts from Friends </h2>
        
        </div>
      
<div class="follow">

</div>



<div class="search-container">
    <input type="search-input" name="search-input" id="search-input" placeholder="search the key word of your friend's post">
    <button>Search</button>
    <?php
if (isset($_GET['search']) && !empty($_GET['search-input'])) {
    $keyword = htmlspecialchars($_GET['search-input']); // Sanitize input

    // Connect to the database
    $db = new mysqli('localhost', 'appuser', 'password', 'assignment2');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Search query for posts containing the keyword
    $sql = "
    SELECT u.login AS friendName, p.post_content AS post
    FROM users u
    JOIN posts p ON u.users_id = p.poster_id
    WHERE p.post_content LIKE ?;
    ";

    $stmt = $db->prepare($sql);
    $searchTerm = "%" . $keyword . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result->num_rows > 0) {
        echo "<h3>Search Results for '$keyword':</h3>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>" . htmlspecialchars($row['friendName']) . ":</strong> " . htmlspecialchars($row['post']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No posts found for the keyword '$keyword'.</p>";
    }

    // Close connection
    $stmt->close();
    $db->close();
}
?>

</div>

<body>

  <?php
 
 
$login = $_SESSION['valid_user'];

$sql_follow_post = "SELECT u2.login AS followedName, p.post_content AS post
FROM users u1
JOIN follow f ON u1.users_id = f.follow_users_id
JOIN users u2 ON f.follow_poster_id = u2.users_id
JOIN posts p ON u2.users_id = p.poster_id
WHERE u1.login = '$login';
";
//execute the query
$result_set_follow_post = mysqli_query($db, $sql_follow_post);


$sql_my_post = "SELECT u.login AS name, p.post_content AS post
FROM users u
JOIN posts p ON u.users_id = p.poster_id
WHERE u.login = '$login'; " ;
$result_my_post = mysqli_query($db, $sql_my_post);

?>

<div id="content">
  <div class="subjects listing">
    <h1>POSTS</h1>

    <div class="actions">
        <button>
      <a class="action" href="new.php">Post A new Comment </a></button>
    </div>



    <table class="list">
      <tr>
        <th>name</th>
        <th>post</th>
      
      </tr>
      <!-- Process the results -->
      <?php while ($results_my = mysqli_fetch_assoc($result_my_post)) { ?>
        <tr>
          <td><?php echo $results_my['name']; ?></td>
          <td><?php echo $results_my['post']; ?></td>
          <!-- send the id as parameter -->
          <td><button>
            <a class="action" href="<?php echo "edit.php?name=" . $results_my['name']; ?>">
            Edit</a>
            </button>
            </td>
          <td><button><a class="action" href=<?php echo "delete.php?name=" . $results_my['name']; ?>">delete</a></button></td> 

        </tr>
      <?php } 
      ?>
    </table>


    <table class="list">
      <tr>
        <th>name</th>
        <th>post</th>
      
      </tr>
      <!-- Process the results -->
      <?php while ($results = mysqli_fetch_assoc($result_set_follow_post)) { ?>
        <tr>
          <td><?php echo $results['followedName']; ?></td>
          <td><?php echo $results['post']; ?></td>
         
          <!-- send the id as parameter -->
          <td><a class="action" href="<?php echo "show.php?followedName=" . $results['followedName']; ?>"><button>Comment</button></a></td>

        </tr>
      <?php } 
      ?>
    </table>
    <br>
    <br>
    <br>
    <br>
    </div>

  </div>

  <?php include 'footer.php'; ?>
</body>

    
      
</body>


</html
