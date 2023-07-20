
<?php 
require "images/config_projet.php";
require "images/articles.php";  

 require_once "templates/header.php"; 
 require "templates/pdo.php";
 
$error = false;
if(isset($_GET["id"])){
    $id = $_GET["id"];
}else {
    $error = true;
}
   $article = getArticlebyId($pdo, $id);


if ($article["image"] === null){
    $imagepath = "images/automobile_logo.png";
} else {
     $imagepath = "images/".$article["image"];
}
    if (!$article){

     $error = true;

} 

?>


 <?php if(!$error){ ?>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img width = 80% src="<?=$imagepath ;?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?=htmlentities($article["title"]); ?></h1>
        <p class="lead"><?=htmlentities($article["description"]);?></p>
        <P class="iead"><?=htmlentities($article["prix"])?>€</p>
        <p class="lead"> année de mise en circulation: <?=htmlentities($article["année"] )?></p>
        <p class="lead"><?=htmlentities($article["kilométrage"]); ?> Km </p>
    </div>
    </div>
    <?php require "contact.php"; ?>
    <?php } else { ?>
        <h1> article introuvable ! </h1>

     <?php } ?>

    
<?php require_once "templates/footer.php"; ?>





