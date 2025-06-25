<?php
require "pdo.php";

var_dump($_POST);
var_dump($_GET);

if(
      (!isset($_POST["title"]) || strlen($_POST["title"]) === 0)
      || (!isset($_POST["genre"]) || strlen($_POST["genre"]) === 0)
      || (!isset($_POST["platform"]) || strlen($_POST["platform"]) === 0)
      || (!isset($_POST["rating"]) || strlen($_POST["rating"]) === 0)
){
      $redirect = "Location: /tp-game-bdd/edit.php?error=1&id=" .$_GET["id"];

      header($redirect);
      exit();
}

$sql = "UPDATE game 

        SET title = :title, 
            genre = :genre,
            platform = :platform,
            rating = :rating

        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
      'title' => $_POST['title'],
      'genre' => $_POST['genre'],
      'platform' => $_POST['platform'],
      'rating' => $_POST['rating'],
      'id' => $_GET['id']
]);

header("Location: /tp-game-bdd/index.php?updated=1");
?>