<?php 
    include 'connection.php';
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
        <script>
            function get(id){
                console.log(id);
                window.location.href = "./view.php?id="+id;
            };

            function del(){
                window.location.href = "./delete.php/";
            };
        </script>
    </head>
    <body>
            <?php foreach($artikel as $article): ?>
            <article>
                <h1><?php echo $article['Header'] ?></h1>
                <h2><?php echo $article['categorie'] ?></h2>
                <p><?php echo $article['Content'] ?> </p>
                <footer>
                    Auteur: <?php echo $article['Auteur'] ?><br>
                    <button onclick='get(<?php echo $article['id']?>)'>View</button>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $article['id']?>">
                        <button onclick='del()' >Delete</button>
                    </form>
                </footer>
            </article>

            <?php endforeach;?>
            <br>
        <!--<pre> <?php// echo print_r($artikel); ?></pre>-->
        <form method="post" action="create.php">
            <input name="title" placeholder="title" required>
                <br>
            <input name="Author" placeholder="Author" required>
                <br>

            <select name="catoID">
            <?php foreach($cato as $category): ?>
                <option value='<?php echo $category["id"]; ?>'> 
                    <?php echo $category["categorie"]; ?><br>
                </options>
            <?php endforeach; ?>
            </select>
                <br>
            <textarea placeholder="Content" name="content" required></textarea>
                <br>
            <button type="submit">KLIK!</button>
        </form>
    </body>
</html>