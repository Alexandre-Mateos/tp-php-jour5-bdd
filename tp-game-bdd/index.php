<?php
require "pdo.php";

$sql = "SELECT * FROM game";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($_GET);
?>

<?php include "header.php"?>
<table>
    <tr>
        <th>Titre</th>
        <th>Genre</th>
        <th>Plateforme</th>
        <th>Note</th>

    </tr>

      <?php foreach ($games as $game) : ?>
          <tr>
              <td><?php echo $game["title"] ?></td>
              <td><?php echo $game["genre"] ?></td>
              <td><?php echo $game["platform"] ?></td>
              <td><?php echo $game["rating"] ?></td>
              <td><a href="item.php?id=<?php echo $game["id"] ?>">Voir</a></td>
              <td><a href="edit.php?id=<?php echo $game["id"] ?>">Modifier</a></td>
              <td>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="images/supprimer-light.png" class="w-25">
                  </button>
              </td>
          </tr>
      <?php endforeach; ?>
</table>

<?php if(isset($_GET['success'] ) && $_GET['success'] === '1') : ?>
    <div class="alert alert-success d-flex justify-content-between" role="alert">
        <p>Jeu ajouté avec succès.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(isset($_GET["deleted"]) && $_GET["deleted"] === '1') : ?>
    <div class="alert alert-success d-flex justify-content-between" role="alert">
        <p>Jeu supprimé avec succès.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(isset($_GET["updated"]) && $_GET["updated"] === '1') : ?>
    <div class="alert alert-success d-flex justify-content-between" role="alert">
        <p>Jeu modifié avec succès.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Attention !</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Vous êtes sur le point de supprimer un jeu. Etes vous sûr de vouloir continuer ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="delete.php?id=<?php echo $game["id"] ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</div>


</body>
</html>