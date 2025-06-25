<?php
require "pdo.php";


if (
      (!isset($_POST["title"]) || strlen($_POST["title"]) < 1)
      || ($_POST["genre"] === "Sélectionner")
      || ($_POST["platform"] === "Sélectionner")
      || (!isset($_POST["rating"]) || strlen($_POST["rating"]) < 1)
) {
      header("Location: /tp-game-bdd/add.php?error=1");
      exit();
}

$sql = "INSERT INTO game (title, genre, platform, rating) VALUES (:title, :genre, :platform, :rating)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
      'title' => htmlspecialchars($_POST['title']),
      'genre' => htmlspecialchars($_POST['genre']),
      'platform' => htmlspecialchars($_POST['platform']),
      'rating' => htmlspecialchars($_POST['rating'])
]);

header("Location: /tp-game-bdd/index.php?success=1");
exit();
?>