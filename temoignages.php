<?php 
require_once "images/config_projet.php";
require_once "templates/header.php"; 
?>


    

<h1>Ecrivez votre témoignage </h1>


<form method="POST" enctype="multipart/form-data" action = "send.php">
<div class="mb-3">
            <label for="nom" class="form-label">Nom complet</label>
            <input type="nom" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Témoignage</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>

        <input type="submit" name="send" class="btn btn-primary" value="Envoyer">

    </form>
<?php require_once "templates/footer.php"; ?>
