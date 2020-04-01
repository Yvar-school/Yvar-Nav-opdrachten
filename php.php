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
            article{
                width: 32%;            
                float: left;    
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
            <br>
        <!--<pre> <?php// echo print_r($artikel); ?></pre>-->
        <form method="post" action="create.php">
        <input name="title" placeholder="title"></input><br>
        <input name="Author" placeholder="Author"></input><br>
        <select name="catoID">
        <?php foreach($cato as $category): ?>
        <option value='<?php echo $category["id"]; ?>'> 
            <?php echo $category["categorie"]; ?><br>
        </options>
        <?php endforeach; ?>
        </select>
       <br><textarea placeholder="Content" name="content"></textarea><br>
       <button type="submit">KLIK!</button>
        </form>
    </body>
</html>