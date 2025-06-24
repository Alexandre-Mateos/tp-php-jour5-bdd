<?php
require "pdo.php";

$sql = "SELECT * FROM game";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($_GET);
?>

<?php include "header.php"?>
      <table>
            <tr>
                  <th>titre</th>
                  <th>genre</th>
                  <th>plateforme</th>
                  <th>note</th>

            </tr>

                  <?php foreach ($games as $game) : ?>
                       <tr>
                             <td><?php echo $game["title"] ?></td>
                             <td><?php echo $game["genre"] ?></td>
                             <td><?php echo $game["platform"] ?></td>
                             <td><?php echo $game["rating"] ?></td>
                             <td><a href="item.php/?id=<?php echo $game["id"] ?>">Voir</a></td>
                       </tr>
                  <?php endforeach; ?>
      </table>

<?php if(isset($_GET['success'] ) && $_GET['success'] === '1') : ?>
    <div class=" d-flex justify-content-between align-items-center" role="alert">
        <p>Jeu ajouté avec succès.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

</body>
</html>