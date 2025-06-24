<?php
require "pdo.php";

$sql = "SELECT * FROM game";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($games);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <table>
                  <?php foreach ($games as $game) : ?>
                       <tr>
                             <td><?php echo $game["title"] ?></td>
                             <td><?php echo $game["genre"] ?></td>
                             <td><?php echo $game["platform"] ?></td>
                             <td><?php echo $game["rating"] ?></td>
                       </tr>
                  <?php endforeach; ?>
      </table>
</body>
</html>