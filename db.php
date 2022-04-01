<?php 

$mysql_hostname = '127.0.0.1';
$mysql_username = 'root';
$mysql_password = '';
$mysql_database = 'test';
$mysql_port = '3306';
$mysql_charset = 'UTF8';

$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);

if($connect->connect_errno){

    echo '[연결실패..] : '.$connect->connect_error.'';

}else{

    echo '[연결성공!]'.'<br>';

}

?>