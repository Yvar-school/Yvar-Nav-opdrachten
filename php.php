<DOCTYPE html>
<html>
    <?php 
        $connection = new PDO('mysql:host=Localhost;dbname=article', 'root', '');
    
        $artikle = $connection->query('select 
            artikel.id,
            artikel.Header,
            artikel.Content,
            artikel.Auteur
            from artikel
        ');
    ?>
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
        
    </body>
</html>