<?php
require "pdo.php";
//var_dump($_GET["id"]);

$sql = "SELECT * FROM game WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($game);
$genres = ['FPS', 'action'];
?>

<?php include "header.php"?>

<form method="post" action="treatment-edit.php?id=<?php echo $game["id"]?>">

      <label for="title">Titre</label>
      <input id="titre" type="text" name="title" value="<?php echo $game["title"] ?>">
      <label for="genre">Genre</label>
      <select name="genre" id="genre">

            <option value="FPS" <?php
                  if($game['genre'] === 'FPS'){
                        echo "selected";
                  }
            ?> >FPS</option>
            <option value="Action"
                  <?php
            if($game['genre'] === 'action'){
                  echo "selected";
            } ?>
            >Action</option>
            <option value="Aventure" <?php
            if($game['genre'] === 'aventure'){
                  echo "selected";
            }
            ?> >Aventure</option>
            <option value="RPG" <?php
            if($game['genre'] === 'RPG'){
                  echo "selected";
            }
            ?>>RPG</option>
            <option value="Stratégie" <?php
            if($game['genre'] === 'stratégie'){
                  echo "selected";
            }
            ?> >Stratégie</option>
            <option value="Gestion" <?php
            if($game['genre'] === 'gestion'){
                  echo "selected";
            }
            ?> >Gestion</option>
      </select>
      <label for="platform">Plateforme</label>
      <select name="platform" id="platform">
            <option value="PC" <?php
            if($game['platform'] === 'PC'){
                  echo "selected";
            } ?> >PC</option>
            <option value="PS5" <?php
            if($game['platform'] === 'PS5'){
                  echo "selected";
            } ?> >PS5</option>
            <option value="XBOX" <?php
            if($game['platform'] === 'XBOX'){
                  echo "selected";
            } ?> >Xbox</option>
            <option value="Switch" <?php
            if($game['platform'] === 'Switch'){
                  echo "selected";
            } ?> >Switch</option>
      </select>
      <label for="rating">Note</label>
      <input id="rating" type="number" name="rating" placeholder="/20" value="<?php echo $game["rating"] ?>">

      <button type="submit">Modifier</button>

</form>

<?php if(isset($_GET["error"]) && $_GET["error"] === "1") : ?>
<p>Il semblerait que vous ayez effacer un champs sans le remplacer !</p>
<?php endif; ?>

</body>
</html>
