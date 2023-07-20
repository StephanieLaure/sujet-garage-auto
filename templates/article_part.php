
<?php
require_once "images/config_projet.php";
  if ($article["image"] === null){
   $imagepath = _ARTICLES_IMAGES_DEFAULT;
  }else {
  $imagepath = ARTICLES_IMAGES_PROJET .$article["image"];
 }


?>


<div class= "col-md-4 my-2 d-flex">     
   <div class="card">
  <img src="<?=$imagepath ?>" class="card-img-top" alt="voiture qashqai">
  <div class="card-body">
    <h5 class="card-title"><?= $article["title"] ?> </h5>
    <p class="card-text"><?=$article['kilométrage'] ?>Km</p>
    <p class ="card-text"><?=$article["prix"] ?> €</p>
    <p class ="card-text"> année: <?=$article["année"] ?></p>
    <a href="actualite.php?id=<?= $article["id"]; ?>" class="btn btn-secondary">Details</a>
  </div>
</div>
</div>  