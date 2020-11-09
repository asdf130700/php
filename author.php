<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'opentutorials');

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
    <style>
    table{
      border : 1px solid black;
    }
    th, td{
      border : 1px solid black;
    }
    </style>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <p><a href="index.php">topic</a></p>
    <table>
        <tr>
        <td>id</td><td>name</td><td>profile</td>
        <?php
            $sql = "SELECT * FROM author";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
              $filterd = array(
                'id'=>htmlspecialchars($row['id']),
                'name'=>htmlspecialchars($row['name']),
                'profile'=>htmlspecialchars($row['profile']),
              );
            ?>
            <tr>
            <td><?=$filterd['id']?></td>
            <td><?=$filterd['name']?></td>
            <td><?=$filterd['profile']?></td>
            <td><a href="author.php?id=<?=$filterd['id']?>">update</a></td>
            </tr>
            <?php
            }
            ?>
        </tr>
    </table>
    <?php
          $filterd_id = mysqli_real_escape_string($conn, $_GET['id']);
          setype($filterd_id, 'integer');
          $sql = "SELECT * FROM author WHERE id = {$filterd_id}"
          echo $sql;
    ?>
    <form action="process_create_author.php" method="post">
        <p><input type="text" name="name" placeholder="name"></p>
        <p><textarea name="profile" placeholder="profile"></textarea></p>
        <p><input type="submit" value="Create author"></p>
        </form>
  </body>
</html>