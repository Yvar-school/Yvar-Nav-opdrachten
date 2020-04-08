<?php 
    include "connection.php";

    $view = $connection->query('select  
            artikel.id,
            artikel.catoID,
            categorien.categorie,
            artikel.Header,
            artikel.Content,
            artikel.Auteur
    from artikel 
    left join categorien
    on categorien.id = artikel.catoID
    where artikel.id = '.$_GET['id'].'
    ');
    $views = $view->fetchAll();
    
?>
<?php foreach($views as $article): ?>
            <article>
                <h1><?php echo $article['Header'] ?></h1>
                <h2><?php echo $article['categorie'] ?></h2>
                <p><?php echo $article['Content'] ?> </p>
                <footer>
                    Auteur: <?php echo $article['Auteur'] ?><br>
                    <button onclick='get(<?php echo $article['id']?>)'>View</button>
                </footer>
            </article>
            <?php endforeach;?>