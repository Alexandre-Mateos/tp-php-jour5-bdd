<?php
require "pdo.php";

$sql = "DELETE FROM game WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);

header("Location: /tp-game-bdd/index.php?deleted=1");
exit();
?>