<?php
        try{
        $connection = new PDO('mysql:host=Localhost;dbname=article', 'root', '');
        }
        catch( PDOException $e )
        {
            die( $e->getMessage() );
        }
        $test = $connection->query('select 
            artikel.id,
            artikel.catoID,
            categorien.categorie,
            artikel.Header,
            artikel.Content,
            artikel.Auteur
            from artikel
            left join categorien 
            on categorien.id = artikel.catoID
        ');
        $artikel = $test->fetchAll();


        $categorieStatement = $connection->query('
            select id, categorie
            from categorien
        ');

        $cato = $categorieStatement->fetchAll(PDO::FETCH_ASSOC);