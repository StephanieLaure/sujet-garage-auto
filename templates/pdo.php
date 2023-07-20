<?php
try
{
    $pdo = new PDO("mysql:dbname=articles_auto;host=localhost:8889", 'root', 'root');
}
catch(Exception $e)
{
    die("Erreur : ".$e->getMessage());
}



?>