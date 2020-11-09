<?php
$conn = mysqli_connect(
'localhost',
'root', 
'111111',
'opentutorials');
print_r($_POST);
$filterd = array('name'=>mysqli_real_escape_string($conn, $_POST['name']),'profile'=>mysqli_real_escape_string($conn, $_POST['profile']));
$sql = "INSERT INTO author (name, profile) VALUES('{$filterd['name']}', '{$filterd['profile']}')";
// die($sql);
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($conn));
}else{
   header('Location:author.php');
echo $sql;
}
?>