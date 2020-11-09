<?php
$conn = mysqli_connect(
'localhost',
'root', 
'111111',
'opentutorials');
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list='';
while($row = mysqli_fetch_array($result)) {
  $escaped_title = htmlspecialchars($row['title']);
  $list= $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  // $list= $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
} 

$article= array(
  'title'=>'Welcome',
  'description'=>'Hello, web'
);
$update_link ='';
$delete_link='';
$author = '';
if(isset($_GET['id'])) {
  $filterd_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql="SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id 
  WHERE topic.author_id=($filterd_id)";
  // echo mysqli_error($conn);
// $sql="SELECT * FROM topic WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
print_r($row);

// echo mysqli_error($conn, print_r($row));

$article['title']= htmlspecialchars($row[title]);
$article['description'] = htmlspecialchars($row['description']);
$article['name'] = htmlspecialchars($row['name']);
$update_link ='<a href="update.php?id='.$_GET['id'].'">update</a>';
// $delete_link ='<a href="process_delete.php?id='.$_GET['id'].'">delete</a>';
$delete_link ='
<form action="process_delete.php" method="post">
<input type="hidden" name="id" value="'.$_GET['id'].'">
<input type="submit" value="delete">
</form>';
$author = "<p>by {$article['name']}</p>";
}
// print_r($article);
// echo $sql;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB</title>
</head>
<body>
  <h1><a href="index.php">WEB</a></h1>
  <ol>
<?=$list?>
  </ol>
  <a href="create.php">create</a>
<?=$update_link?>
&nbsp;
<?=$delete_link?>
  <h2><?=$article['title']?></h2>
 <?=$article['description']?>
 <?=$author?>
</body>
</html>