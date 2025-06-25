<?php
include "header.php";

//var_dump($_GET);
?>

<form method="get" action="treatment-add.php">
      <label for="title">Titre</label>
      <input id="titre" type="text" name="title">
      <label for="genre">Genre</label>
      <select name="genre" id="genre">
            <option >Sélectionner</option>
            <option value="FPS">FPS</option>
            <option value="Action">Action</option>
            <option value="Aventure">Aventure</option>
            <option value="RPG">RPG</option>
            <option value="Stratégie">Stratégie</option>
            <option value="Gestion">Gestion</option>
      </select>
      <label for="platform">Plateforme</label>
      <select name="platform" id="platform">
            <option >Sélectionner</option>
            <option value="PC">PC</option>
            <option value="PS5">PS5</option>
            <option value="XBOX">Xbox</option>
            <option value="Switch">Switch</option>
      </select>
      <label for="rating">Note</label>
      <input id="rating" type="number" name="rating" placeholder="/20">
      <button type="submit">Ajouter</button>
</form>

<?php if(isset($_GET["response"]) && $_GET["response"] === "error1") : ?>
      <p>Vous devez remplir tous les champs !</p>
<?php endif; ?>


</body>
</html>
