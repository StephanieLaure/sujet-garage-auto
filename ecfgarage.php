
   <?php
   require_once "images/config_projet.php";
   require_once "session.php";
   require "templates/pdo.php";
   require "images/articles.php";
   require "templates/header.php";

   $articles = getArticles($pdo ,3);

   ?>
   
   <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img width = 50% src="images/automobile_logo.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
    <div class = "col-md p-2">
    <div class="card" style="width: 12rem;" border-radius = 50%; >
  <img src="images/happy_customer2.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Service très professionnel et reactif, j'adore ma nouvelle voiture .</p><br>
    Daniel B.
  </div>
</div>
</div>
<div class ="col-md p-2">
<div class="card" style="width: 12rem;" border-radius = 50%;>
  <img src="images/happy_customer.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">je recommande VP Garage , très satisfaite de mon achat .</p><br>
    Stephanie L
  </div>
</div>
</div>
<div class ="col-md p-2">
<div class="card" style="width: 12rem;" border-radius = 50%;>
  <img src="images/happy_customer3.jpg" class="card-img-top" alt="..." style = >
  <div class="card-body">
    <p class="card-text">je recommande vp garage pour tout entretien de vos voitures.</p><br>
    Junior Brown
  </div>
</div>
</div>





    </div>
  </div>
   <div class = "row text-center">
    <?php foreach ($articles as $key=> $article) { ?>
    <?php require "templates/article_part.php"; ?>
    <?php } ?>
   
    </div>

<?php
require "templates/footer.php";

?>


   