<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Array</h1>
    <?php
$coworkers =array('egoing', 'leezche', 'duru' ,'taeho');
// echo $coworkers[3].'<br>';
// echo $coworkers[1].'<br>';
// var_dump(count($coworkers)).'<br>';
// array_push($coworkers, 'graphitte');
// var_dump($coworkers).'<br>';
// var_dump(count($coworkers)).'<br>';
// print_r($coworkers).'<br>';
array_splice($coworkers, 2, 0 ,'error');
var_dump($coworkers).'<br>';
array_splice($coworkers, 2, 'error');
var_dump($coworkers);

    ?>
</body>
</html>