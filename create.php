<?php


$connection = new PDO('mysql:host=Localhost;dbname=article', 'root', '');

$statement = $connection->prepare('
    insert into artikel (catoID, Header, Content, Auteur)
    values (:catoID, :Header, :Content, :Auteur)
');

$statement->execute([
    'catoID' => $_POST['catoID'],
    'Header'  => $_POST['title'],
    'Content'  => $_POST['content'],
    'Auteur'  => $_POST['Author']
]);

header('Location: php.php');