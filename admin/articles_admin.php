<?php
require_once '../images/config_projet.php';
require_once '../session.php';


require_once '../templates/pdo.php';
require_once  '../images/articles.php';
require_once "header_admin.php";

if (isset($_GET['page'])) {
  $page = (int)$_GET['page'];
} else {
  $page = 1;
}
$articles = getArticles($pdo, _ADMIN_ITEM_PER_PAGE, $page);

$totalArticles = getTotalArticles($pdo);

$totalPages = ceil($totalArticles / _ADMIN_ITEM_PER_PAGE);

?>


<h1 class="display-5 fw-bold text-body-emphasis">Articles</h1>
<div class="d-flex gap-2 justify-content-left py-5">
  <a class="btn btn-primary d-inline-flex align-items-left" href="article_admin.php">
    Ajouter un article
  </a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article) { ?>
      <tr>
        <th scope="row"><?= $article["id"]; ?></th>
        <td><?= $article["title"]; ?></td>
        <td><a href="article_admin.php?id=<?= $article['id'] ?>">Modifier</a>
          | <a href="article_delete.php?id=<?= $article['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php if ($totalPages > 1) { ?>
      <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <li class="page-item">
          <a class="page-link <?php if ($i == $page) { echo " active";} ?>" href="?page=<?php echo $i; ?>" >
            <?php echo $i; ?>
          </a>
        </li>
      <?php } ?>
    <?php } ?>
  </ul>
</nav>


<?php require_once "footer_admin.php"; ?>