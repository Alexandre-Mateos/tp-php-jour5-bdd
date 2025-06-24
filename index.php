<?php
$pdo = new PDO(
'mysql:host=localhost;dbname=spotify;charset=utf8',
'root',
''
);

//Récupérer PLUSIEURS lignes (fetchAll)

//1 : écrire en TEXTE la requête
$sql = "SELECT * FROM song";

//2 : On prépare la requête
$stmt = $pdo->prepare($sql);

//3 : On execute la requête
$stmt->execute();

//on récupère les datas
//fetchAll -> récuperation de PLUSIEURS LIGNES
//FETCH_ASSOC -> récupère les valeurs sous formes de tableaux associatif
$songs = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($songs);

//Récupérer UNE SEULE ligne par ID (fetch)

//1 : écrire en TEXTE la requête. ON passe par l'intermédiare :id. Ne jamais mettre directememnt ce qu'on veut
//par question de sécurité.
$sql = "SELECT * FROM song WHERE id = :id";

//2 : On prépare la requête
$stmt = $pdo->prepare($sql);

//3 : On execute la requête en remplaçant "id" par la valeur qu'on veut
$stmt->execute(['id' => 1]);

//Utilisation de FETCH (tout court) qui ne rend qu'un seul résultat
$songs = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($songs);


//Récupérer UNE SEULE ligne par label (fetch)
$sql = "SELECT * FROM song WHERE title = :title";
$stmt = $pdo->prepare($sql);
$stmt->execute(['title' => 'mustach gracias']);
$song = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($song);


// Insérer une chanson
//$sql = "INSERT INTO song (title, description, note) VALUES (:title, :description, :note)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([
//      'title' => 'One more time',
//      'description' => 'OnemoretimeOnemoretimeOnemoretimeOnemoretime',
//      'note' => 8
//]);


//Insérer plusieurs chansons (boucle)
//$songs = [
//      ['title' => 'titre1', 'description' => 'titre1titre1titre1', 'note' => 5],
//      ['title' => 'titre2', 'description' => 'titre2titre2titre2', 'note' => 5],
//      ['title' => 'titre3', 'description' => 'titre3titre3titre3', 'note' => 5],
//];
//
//$sql = "INSERT INTO song (title, description, note) VALUES (:title, :description, :note)";
//$stmt = $pdo->prepare($sql);
//
//foreach ($songs as $song) {
//      $stmt->execute($song);
//}

//mettre à jour une chanson
$sql = "UPDATE film SET duration = :duration WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
      'duration' => 200,
      'id' => 1
]);

?>