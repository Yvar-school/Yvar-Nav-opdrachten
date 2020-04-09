<?php 

require "connection.php";

if(!isset($_POST['id'])) 
{
    echo "leuk geprobeerd";
    exit;
}

if(!is_numeric($_POST['id']))
{
    echo "leuk geprobeerd";
    exit;
}

$statement = 'DELETE FROM artikel WHERE artikel.id = ?'; 

$delete = $connection->prepare($statement);
$delete->bindValue(1, $_POST['id']);
$delete->execute();
header("Location: ./php.php");