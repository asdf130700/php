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
if(isset($_GET['id'])) {
  $filterd_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql="SELECT * FROM topic WHERE id=($filterd_id)";
// $sql="SELECT * FROM topic WHERE id={$_GET['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$article['title']= htmlspecialchars($row['title']);
$article['description'] = htmlspecialchars($row['description']);
$update_link ='<a href="update.php?id='.$_GET['id'].'">update</a>';
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
<form action="process_create.php" method="POST">
<p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"><p>
<p><textarea name="description" palceholder="description"><?=$article['description']?></textarea></p>
<p><input type="submit"></p>
</form>
</body>
</html>