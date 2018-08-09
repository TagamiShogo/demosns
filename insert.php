<?php
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","mysql");
    if($_POST['board']=="A"){
        $pdo -> exec("insert into demosns(username,post)values('".$_POST['username']."','".$_POST['post']."');");}
    elseif ($_POST['board']=="B"){
        $pdo -> exec("insert into padsns(username,post)values('".$_POST['username']."','".$_POST['post']."');");}
    else{
        $pdo -> exec("insert into pcsns(username,post)values('".$_POST['username']."','".$_POST['post']."');");}

    header("Location:http://localhost/demosns/index.php");

?>