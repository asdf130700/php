<?php
$conn = mysqli_connect(
'localhost',
'root', 
'111111',
'opentutorials');

settype($_POST['id'], 'integer');
$filterd = array(
'id'=>mysqli_real_escape_string($conn, $_POST['id'])

);
$sql = "
DELETE FROM topic
WHERE id = {$filterd['id']}   
";
// die($sql);
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '삭제하는 과정에서 문제가 생겼습니다.';
    print(mysqli_error($conn));
    // error_log(mysqli_error($conn));
}else{
    echo '삭제했습니다. <a href="index.php">돌아가기</a>';
}
echo $sql;
?>