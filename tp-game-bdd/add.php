<?php
include "header.php";

//var_dump($_GET);
$genres = ['FPS', 'action', 'aventure', 'RPG', 'stratégie', 'gestion'];
$platform = ['PC', 'PS5', 'XBOX', 'Switch'];
?>

<form method="post" action="treatment-add.php">
      <label for="title">Titre</label>
      <input id="titre" type="text" name="title">
      <label for="genre">Genre</label>
      <select name="genre" id="genre">
            <option >Sélectionner</option>
            
          <?php foreach ($genres as $item) : ?>
              <option value="<?php echo $item ?>"><?php echo $item ?></option>
          <?php endforeach; ?>

      </select>
      <label for="platform">Plateforme</label>
      <select name="platform" id="platform">
            <option >Sélectionner</option>

          <?php foreach ($platform as $item) : ?>
              <option value="<?php echo $item ?>"><?php echo $item ?></option>
          <?php endforeach; ?>

      </select>
      <label for="rating">Note</label>
      <input id="rating" type="number" name="rating" placeholder="/20">
      <button type="submit">Ajouter</button>
</form>

<?php if(isset($_GET["error"]) && $_GET["error"] === "1") : ?>
      <p>Vous devez remplir tous les champs !</p>
<?php endif; ?>


</body>
</html>
