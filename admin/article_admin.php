<?php
require_once '../images/config_projet.php';
require_once  '../session.php';


require_once '../templates/pdo.php';
require_once '../tools.php';
require_once '../images/articles.php';
require_once  "category.php";
require_once  "header_admin.php";


$errors = [];
$messages = [];
$article = [
    'title' => '',
    'description' => '',
    'category_id' => ''
];



if (isset($_GET['id'])) {
    
    $article = getArticleById($pdo, $_GET['id']);
    if ($article === false) {
        $errors[] = "L'article n\'existe pas";
    }
    $pageTitle = "Formulaire modification article";
} else {
    $pageTitle = "Formulaire ajout article";
}

if (isset($_POST['saveArticle'])) {

    
    
    $fileName = null;
    
    if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
        $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
        if ($checkImage !== false) {
            $fileName = slugify(basename($_FILES["file"]["name"]));
            $fileName = uniqid() . '-' . $fileName;



           
            if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__).ARTICLES_IMAGES_PROJET . $fileName)) {
                if (isset($_POST['image'])) {
                    
                    unlink(dirname(__DIR__).ARTICLES_IMAGES_PROJET . $_POST['image']);
                }
            } else {
                $errors[] = 'Le fichier n\'a pas été uploadé';
            }
        } else {
            $errors[] = 'Le fichier doit être une image';
        }
    } else {
        
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image'])) {
                
                unlink(dirname(__DIR__).ARTICLES_IMAGES_PROJET . $_POST['image']);
            } else {
                $fileName = $_POST['image'];
            }
        }
    }
    
    $article = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'category_id' => $_POST['category_id'],
        'image' => $fileName
    ];
    
    if (!$errors) {
        if (isset($_GET["id"])) {
            
            $id = (int)$_GET["id"];
        } else {
            $id = null;
        }
        
        $res = saveArticle($pdo, $_POST["title"], $_POST["description"], $fileName, (int)$_POST["category_id"], $id);

        if ($res) {
            $messages[] = "L'article a bien été sauvegardé";
            
            if (!isset($_GET["id"])) {
                $article = [
                    'title' => '',
                    'description' => '',
                    'category_id' => ''
                ];
            }
        } else {
            $errors[] = "L'article n'a pas été sauvegardé";
        }
    }
}

?>
<h1><?= $pageTitle; ?></h1>

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
<?php if ($article !== false) { ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $article['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" id="description" name="description" rows="8"><?= $article['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <select name="category_id" id="category" class="form-select">
                <?php foreach ($categories as $category) { ?>
                    <option value="1" <?php if (isset($article['category_id']) && $article['category_id'] == $category['id']) { ?>selected="selected" <?php }; ?>><?= $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <?php if (isset($_GET['id']) && isset($article['image'])) { ?>
            <p>
                <img src="<?= ARTICLES_IMAGES_PROJET. $article['image'] ?>" alt="<?= $article['title'] ?>" width="100">
                <label for="delete_image">Supprimer l'image</label>
                <input type="checkbox" name="delete_image" id="delete_image">
                <input type="hidden" name="image" value="<?= $article['image']; ?>">

            </p>
        <?php } ?>
        <p>
            <input type="file" name="file" id="file">
        </p>

        <input type="submit" name="saveArticle" class="btn btn-primary" value="Enregistrer">

    </form>

<?php } ?>



<?php require_once "footer_admin.php"; ?>