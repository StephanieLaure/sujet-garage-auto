<?php
require_once 'images/config_projet.php';
require_once 'session.php';
require_once 'templates/pdo.php';
require_once 'user.php';

require_once 'templates/header.php';


$errors = [];
$messages = [];

if (isset($_POST['loginUser'])) {

    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);

    if ($user) {
        session_regenerate_id(true);
        $_SESSION['user'] = $user;
        if ($user['role'] === 'admin') {
            header('location: admin/index_admin.php');
        } else {
            header('location: ecfgarage.php');
        }
    } else {
        $errors[] = 'Email ou mot de passe incorrect';
    }

  }

?>
    <h1>Login</h1>

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
    <form method="POST">
        <div class="mb-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de psse</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <input type="submit" name="loginUser" class="btn btn-primary" value="Envoyer">

    </form>

    <?php
require_once 'templates/footer.php';
?>