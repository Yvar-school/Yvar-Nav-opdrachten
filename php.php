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


    ?>
<DOCTYPE html>   
<html>
    <head>
        <style>
        	html{
				margin: 0;
				padding: 0;
				height: 100%;
			}
			body{
				margin: 0;
				padding: 0;
				height: 100%;
			}
        </style>
    </head>
    <body>
            <?php foreach($artikel as $article): ?>
            <article>
                <h2><?php echo $article['categorie'] ?></h2>
                <h1><?php echo $article['Header'] ?></h1>
                <p><?php echo $article['Content'] ?> </p>
                <footer>Auteur: <?php echo $article['Auteur'] ?></footer>
            </article>
            <?php endforeach;?>
        <!--<pre> <?php// echo print_r($artikel); ?></pre>-->
    </body>
</html>