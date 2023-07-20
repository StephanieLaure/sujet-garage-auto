<?php
require_once 'images/config_projet.php';
require_once 'tools.php';
require_once 'templates/pdo.php';
require_once 'user.php';

require_once 'templates/header.php';


$errors = [];
$messages = [];
if (isset($_POST['addUser'])) {
    
    $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
    if ($res) {
        $messages[] = 'Merci pour votre inscription';
    } else {
        $errors[] = 'Une erreur s\'est produite lors de votre inscription';
    }
}

?>
    <h1>Inscription</h1>

    <?php foreach ($messages as $message) { ?>
        <div class="alert alert-success" role="alert">
            <?= $message; ?>
        </div>
    <?php } ?>
    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error; ?>
        </div>
    <?php } ?>
    <form method="POST"  id='lessonForm' >
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="last_name" name="last_name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de psse</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <input type="submit" name="addUser" class="btn btn-primary" value="Enregistrer">

    </form>



    
    <script> (function() {
        'use strict'

        let form = document.getElementById('lessonForm');

        form.addEventListener('submit', function(event) {
            
            Array.from(form.elements).forEach((input) => {
                if (input.type !== "submit") {
                    if (!validateFields(input)) {
                        alert('1')
                        event.preventDefault();
                        event.stopPropagation();
                        
                        input.classList.remove("is-valid");
                        input.classList.add("is-invalid");
                        
                    } 
                    else {
                      	alert('3')
                        
                        input.classList.remove("is-invalid");
                        input.classList.add("is-valid");
                    }
                }
            });
        }, false)
    })()

    

    function validateRequired(input) {
        return !(input.value == null || input.value == "");
    }

    function validateLength(input, minLength, maxLength) {
    return !(input.value.length < minLength || input.value.length > maxLength);
    }
    function validateText(input) {
        return input.value.match("^[A-Za-z]+$");
    }
    function validateEmail(input) {
        let EMAIL = input.value;
        let POSAT = EMAIL.indexOf("@");
        let POSDOT = EMAIL.lastIndexOf(".");

        return !(POSAT < 1 || (POSDOT - POSAT < 2));
    }

    function validateFields(input) {

let fieldName = input.name;   }


if (fieldName == "first_name") {
        if (!validateRequired(input)) {
        return false;
    }

    if (!validateLength(input, 2, 20)) {
        return false;
    }

    if (!validateText(input)) {
        return false;
    }

    return true;
}
if (fieldName == "last_name") {
            if (!validateRequired(input)) {
                return false;
            }

            if (!validateLength(input, 2, 20)) {
                return false;
            }

            if (!validateText(input)) {
                return false;
            }

            return true;
        }

 if (fieldName == "email") {

if (!validateRequired(input)) {
    return false;
}

if (!validateEmail(input)) {
    return false;
}

return true;
}
</script>
    <?php
require_once 'templates/footer.php';
?>