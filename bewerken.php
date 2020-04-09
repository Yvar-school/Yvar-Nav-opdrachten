<?php 


    include "connection.php";

    $update = 'update artikel set catoID=:catoID, Header=:Header, Content=:Content, Auteur=:Auteur where id=:id';

    $data = [
        'id' => $_POST['id'],
        'catoID' => $_POST['catoID'],
        'Header' => $_POST['Header'],
        'Content' => $_POST['Content'],
        'Auteur' => $_POST['Auteur'],
    ];
    
    $bewerken = $connection->prepare($update);
    $bewerken->execute($data);
    header("Location: php.php");