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
            <form action="bewerken.php" method="post">
               <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                <input type="text" name="Header" value="<?php echo $article['Header'] ?>"><br>
                <select name="catoID">
                    <?php foreach($cato as $category): ?>
                        <option value='<?php echo $category["id"]; ?>'> 
                            <?php echo $category["categorie"]; ?>
                        </options>
                    <?php endforeach; ?>
                    </select><br>
                    
                <input type="text" name="Content" value="<?php echo $article['Content'] ?>"><br>
                <input type="text" name="Auteur" value="<?php echo $article['Auteur'] ?>"><br>
                <button type="submit">update</button>
            </form>
            <?php endforeach;?>