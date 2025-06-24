<?php
require "pdo.php";

$sql = "SELECT * FROM game";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($games);
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

<?php if($_GET["success"] === 1) : ?>
// ajout de l'alerte
<?php endif; ?>

</body>
</html>