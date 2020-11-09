<?php
$conn = mysqli_connect(
'localhost',
'root', 
'111111',
'opentutorials');

$sql = "SELECT * FROM topic";

$result = mysqli_query($conn, $sql);
// print_r(mysqli_fetch_array($result));
// var_dump($result->num_rows); 
// $row = mysqli_fetch_array($result);
// print_r($row);
// echo $row[0];

while($row = mysqli_fetch_array($result)) {
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['description'];
}
?>