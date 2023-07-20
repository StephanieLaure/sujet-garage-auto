<?php 
require_once "images/config_projet.php";
require_once "templates/header.php"; 

?>



<h1>Nous contacter </h1>

<form method="POST" enctype="multipart/form-data" action= "send.php">
        <div class ="mb-3">
            <label for ="nom" class="form-label"> Nom </label>
            <input type = "nom" class="form-control" id = "nom" name = "nom" required>
        </div>
        <div class ="mb-3">
            <label for ="prenom" class="form-label"> Prenom </label>
            <input type = "prenom" class="form-control" id= "prenom" name= "prenom" required>

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class ="mb-3">
            <label for ="subject" class="form-label"> Subject </label>
            <input type = "text" class="form-control" id = "subject" name = "subject" required>
        </div>
        <div class ="mb-3">
            <label for ="number" class="form-label"> Numéro de Telephone </label>
            <input type = "number" class="form-control" id= "number" name= "number" required>
        </div>
        
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>

        <input type="submit" name="send" class="btn btn-primary" value="Envoyer">

    </form>
<?php require_once "templates/footer.php"; ?>
