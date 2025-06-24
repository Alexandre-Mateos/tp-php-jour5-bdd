<?php
require "pdo.php";
//var_dump($_GET);

$sql = "SELECT * FROM game WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($game);
?>

<?php include "header.php" ?>
<p>Titre : <?php echo $game["title"] ?></p>
<p>Genre : <?php echo $game["genre"] ?></p>
<p>Plateforme : <?php echo $game["platform"] ?></p>
<p>Note : <?php echo $game["rating"] ?></p>
</body>
</html>
