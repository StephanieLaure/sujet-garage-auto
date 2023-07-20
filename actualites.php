<?php 
require "images/config_projet.php";
require "images/articles.php";

require "templates/pdo.php";

require "templates/header.php"; 

 $articles = getArticles($pdo);

?>


<h5> Nos differentes voitures d'occasion </h5>

<div class = "row text-center">
    <?php foreach ($articles as $key => $article) { ?>
    <?php require "templates/article_part.php"; ?>
    <?php } ?>
   
    </div>


<?php require "templates/footer.php" ; ?>