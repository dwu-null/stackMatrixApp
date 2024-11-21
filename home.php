<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="introduction of form validation">
    <meta name="keyword" content="JavaScript, form validation, form, Selector">
    <meta name="author" content="Di Wu">
    <title>Home | EchoMatrix</title>

    <link rel="stylesheet" href="style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="formcontainer">
        <h1>EchoMatrix</h1>
        <hr>
        <form action="post.php" method="post">

            <label for="title">Blog Title</label>
            <input type="text" id="title" name="title" maxlength="20" size="20">

                <label for="name">Author Name</label>
                <input type="text" id="name" name="name" maxlength="20" size="20">

                <label>Category</label>
                <select name="categories" id="categories">
                    <option value="Finance">Finance</option>
                    <option value="Business">Business</option>
                </select>
            
                <label for="message">Write your post here</label><br>
                <textarea id="message" name="message" rows="10" cols="45" placeholder="What is happening?!"></textarea>

            <button class="input-size" id="add-post" type="submit">Post</button>
        </form>

        <?php
        //connect with the database

        require_once('database.php');

        $db = db_connect(); //my connection

        $sql = "SELECT * FROM THREADS "; //query string
        $sql .= "ORDER BY thread_id DESC";
        //execute the query
        $result_set = mysqli_query($db, $sql);
        ?>

        <table class="list">
        <tr>
            <th>id</th> <!-- to be deleted -->
            <th>THREADS</th>
        </tr>
        <!-- Process the results -->
        <?php while ($results = mysqli_fetch_assoc($result_set)) { ?>
        <tr>
            <td><?php echo $results['thread_id']; ?></td> <!-- to be deleted -->
            <td><?php echo $results['message']; ?></td>
            <td><?php echo $results['post_time']; ?></td>
            <!-- send the id as parameter -->
            <td><a class="action" href="<?php echo "view.php?id=" . $results['thread_id']; ?>">View</a></td>
            <td><a class="action" href="<?php echo "edit.php?id=" . $results['thread_id']; ?>">Edit</a></td>
            <td><a class="action" href="<?php echo "delete.php?id=" . $results['thread_id']; ?>">delete</a></td>
        </tr>
        <?php } 
        ?>
        </table>
        
        <p class="comment">threads</p>
        <form action="registration.html" method="get" onsubmit="return validate();">
            <label for="message">Post your reply</label><br>
            <textarea id="message" name="message" rows="10" cols="45" placeholder="Post your reply"></textarea>

            <button class="input-size" id="add-post" type="submit">Reply</button>
        </form>
        <p>reply1</p>
        <p>reply2</p>
    </div>

</body>
</html>