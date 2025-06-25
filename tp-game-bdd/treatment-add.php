<?php
require "pdo.php";


if(
      (!isset($_GET["title"]) && strlen($_GET["title"]) < 1)
      || ($_GET["genre"] === "Sélectionner")
      || ($_GET["platform"] === "Sélectionner")
      || (!isset($_GET["rating"]))
){
            header("Location: /tp-game-bdd/add.php?response=error1");
            exit();
      }

$sql = "INSERT INTO game (title, genre, platform, rating) VALUES (:title, :genre, :platform, :rating)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
      'title' => htmlspecialchars($_GET['title']),
      'genre' => htmlspecialchars($_GET['genre']),
      'platform' => htmlspecialchars($_GET['platform']),
      'rating' => htmlspecialchars($_GET['rating'])
]);

header("Location: /tp-game-bdd/index.php?success=1");

?>