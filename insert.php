<?php
$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");
// mysqli_query($conn,"
// INSERT INTO topic
// (title, description, created) 
// VALUES('MySQL2','MYSQL2 is ...', NOW()
// )");
$sql ="
INSERT INTO topic(
    title,
    description,
    created
    ) VALUES(
        'MySQL3',
        'MySQL3 is....',
        NOW()
    )";
$reuslt = mysqli_query($conn, $sql);
if($reuslt === false){
    echo mysqli_error($conn);
}
?> 