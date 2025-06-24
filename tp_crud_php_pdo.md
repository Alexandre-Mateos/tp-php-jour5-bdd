
# TP : Mini-CRUD PHP + PDO – Gestion de jeux vidéo

## 🎯 Objectif

Créer une mini-application PHP qui permet de gérer un ensemble de données (affichage, ajout, modification et suppression) à l’aide de PDO et de sessions.

---

## 📦 Sujet

### Thème : Gestion d’une collection de **jeux vidéo**

**Table à créer : `game`**

Champs à créer :
- `id` (INT, AUTO_INCREMENT, PRIMARY)
- `title` (VARCHAR 255)
- `genre` (VARCHAR 100)
- `platform` (VARCHAR 100)
- `rating` (INT)

Chaque jeu vidéo aura donc un titre, un genre (ex : RPG, FPS…), une plateforme (ex : PC, PS5…), et une note (entre 0 et 20).

---

## 🗃️ Étape 1 — Préparer la base de données

- Créez une base de données `mygames`.
- Créez la table `game` avec les champs ci-dessus.
- Ajoutez quelques jeux manuellement depuis PhpMyAdmin ou un script d’init.

---

## 🗂️ Étape 2 — Architecture des fichiers

Créez les fichiers suivants :
- `index.php` → page d’accueil qui affiche tous les jeux
- `item.php` → page de détails d’un seul jeu
- `add.php` → formulaire d’ajout d’un jeu
- `edit.php` → formulaire de modification
- `delete.php` → suppression d’un jeu (redirige vers `index.php`)
- `pdo.php` → fichier contenant la connexion PDO à la BDD
- `functions.php` (optionnel) → si vous voulez créer des fonctions pour vous aider

Sur chaque page `item.php`, `edit.php` et `add.php`, vous devez inclure **un lien de retour vers `index.php`** (la liste des jeux).

---

## 📄 Étape 3 — Lire les données (READ)

### `index.php`

- Listez tous les jeux (avec `fetchAll`) dans un tableau HTML.
- Chaque ligne contient :
  - un lien “voir” (vers `item.php`)
  - un lien “modifier” (vers `edit.php`)
  - un lien “supprimer” (vers `delete.php`)

### `item.php`

- Récupérez un jeu par son `id` passé en `GET` (avec `fetch`)
- Affichez proprement ses informations.

---

## 🆕 Étape 4 — Ajouter un jeu (CREATE)

### `add.php`

- Créez un formulaire HTML avec les champs `title`, `genre`, `platform`, `rating`.
- À la soumission :
  - Vérifiez que tous les champs sont remplis.
  - Utilisez `INSERT INTO` via PDO pour ajouter un jeu.
  - Redirigez vers `index.php?success=1`.

### `index.php`

- Si `$_GET['success']` est présent, affichez une alerte Bootstrap :
  > ✅ Jeu ajouté avec succès.

---

## 🔄 Étape 5 — Modifier un jeu (UPDATE)

### `edit.php`

- Récupérez le jeu par `id` passé en `GET`.
- Pré-remplissez le formulaire avec ses données.
- À la soumission :
  - Vérifiez les champs.
  - Utilisez `UPDATE` pour enregistrer les modifications.
  - Redirigez vers `index.php?updated=1`.

### `index.php`

- Si `$_GET['updated']` est présent, affichez une alerte :
  > ✏️ Jeu modifié avec succès.

---

## 🗑️ Étape 6 — Supprimer un jeu (DELETE)

### `delete.php`

- Récupérez le `id` depuis `GET`.
- Supprimez le jeu via un `DELETE`.
- Redirigez vers `index.php?deleted=1`.

### `index.php`

- Si `$_GET['deleted']` est présent, affichez une alerte :
  > 🗑️ Jeu supprimé avec succès.

---

## ✅ Bonus

- Protégez vos actions : si un `id` n'existe pas, affichez un message d’erreur.
- Ajoutez une popup JavaScript de confirmation avant la suppression.
- Triez les jeux par note ou plateforme.
