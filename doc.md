# 📘 Récapitulatif : PDO avec MySQL

## 🔌 Connexion à une base de données

```php
$pdo = new PDO(
    'mysql:host=localhost;dbname=allocine_tiny;charset=utf8',
    'root',
    ''
);
```

## 📥 Récupérer PLUSIEURS les lignes (fetchAll)
```php
$sql = "SELECT * FROM film";
$stmt = $pdo->query($sql);
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($films);
```

## 🔍 Récupérer UNE SEULE ligne par ID (fetch)
```php
$sql = "SELECT * FROM film WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => 1]);
$film = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($film);
```

## 🔍 Récupérer UNE SEULE par label (fetch)
```php
$sql = "SELECT * FROM film WHERE label = :label";
$stmt = $pdo->prepare($sql);
$stmt->execute(['label' => 'Interstellar']);
$film = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($film);
```
- ⚠️ fetch() ne renvoie qu'une seule ligne : la première trouvée.


## ➕ Insérer un film
```php
$sql = "INSERT INTO film (label, duration) VALUES (:label, :duration)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'label' => 'Inception',
    'duration' => 148
]);
```

## 🧩 Insérer plusieurs films (boucle)
```php
$films = [
    ['label' => 'Dune', 'duration' => 155],
    ['label' => 'Avatar', 'duration' => 162],
    ['label' => 'Tenet', 'duration' => 150],
];

$sql = "INSERT INTO film (label, duration) VALUES (:label, :duration)";
$stmt = $pdo->prepare($sql);

foreach ($films as $film) {
    $stmt->execute($film);
}
```

## ❌ Supprimer un film par ID
```php
$sql = "DELETE FROM film WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => 2]);
```

## 🔄 Mettre à jour un film
```php
$sql = "UPDATE film SET duration = :duration WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'duration' => 200,
    'id' => 1
]);
```

## Bonnes pratiques : 
- Toujours utiliser prepare() + execute() pour éviter les injections SQL.
- Toujours définir le charset=utf8 dans le DSN.
- Utiliser fetch() pour une seule ligne et fetchAll() pour plusieurs lignes.

## ℹ️ Bonus : récupérer l'ID auto-incrémenté
```php
$pdo->lastInsertId();
```
