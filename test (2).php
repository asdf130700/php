<?php
$conn = mysqli_connect(
'localhost',
'root', 
'111111',
'opentutorials');
$sql= "SELECT * FROM topic";
$sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
print_r($row);
?>