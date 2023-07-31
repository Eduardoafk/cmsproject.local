<?php
    include 'secur.php';


$db['db_host'] = "localhost";
$db['db_user'] = "cmsproject";
$db['db_pass'] = "lGGxoQtR4m392yj5";
$db['db_name'] = "cmsproject";

foreach($db as $key => $value){

    define(strtoupper($key), $value);

}

$connection = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'], $db['db_name']);

if($connection) {

echo "We are connected";

}

?>