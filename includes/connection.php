<?php
$host = "localhost";
$user = "root";
$paswd  =  '';
$db = "mobile";

$conect = mysqli_connect($host, $user, $paswd, $db);
if(!$conect){
    die ('connection error');
}