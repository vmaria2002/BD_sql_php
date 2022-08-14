<?php
require_once('PEAR.php');
$user ='colocviu_final';
$pass ='student';
$host='localhost';
$bd_name='colocviu';
//se stabileste sirul pentru conexiunea universala
$dsn= new mysqli($host, $user, $pass, $db_name);
//se verifica daca s-a realizat conectarea:
    if($dsn->connect_error){
        die('eroare la conectare:'.$dsn->connect_error);
    }
    mysqli_close($dsn);

?>