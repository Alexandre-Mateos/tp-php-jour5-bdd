<?php
require "pdo.php";
//var_dump($_GET["id"]);

$sql = "SELECT * FROM game WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($game);
$genres = ['FPS', 'action', 'aventure', 'RPG', 'stratégie', 'gestion'];
$platform = ['PC', 'PS5', 'XBOX', 'Switch'];
?>

<?php include "header.php"?>

<form method="post" action="treatment-edit.php?id=<?php echo $game["id"]?>">

      <label for="title">Titre</label>
      <input id="titre" type="text" name="title" value="<?php echo $game["title"] ?>">
      <label for="genre">Genre</label>
      <select name="genre" id="genre">

            <?php foreach ($genres as $item) : ?>
                  <?php if($item === $game['genre']) : ?>
                        <option value = <?php echo $item?> <?php echo "selected" ?> ><?php echo $item ?></option>
                  <?php else : ?>
                  <option value = <?php echo $item ?> ><?php echo $item ?></option>
                  <?php endif; ?>
            <?php endforeach; ?>

      </select>
      <label for="platform">Plateforme</label>

      <select name="platform" id="platform">

            <?php foreach ($platform as $item) : ?>
                  <?php if($item === $game['platform']) : ?>
                        <option value="<?php echo $item ?>" <?php echo "selected" ?> ><?php echo $item ?></option>
                  <?php else : ?>
                        <option value="<?php echo $item ?>"><?php echo $item ?></option>
                  <?php endif; ?>

            <?php endforeach; ?>

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
