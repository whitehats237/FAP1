<?php
$host = 'localhost';
$db = 'archeo_it';
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT * FROM Actualites ORDER BY date_publication DESC");
    echo '<div class="actualites-list">';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="actualite">';
        echo '<h3>' . htmlspecialchars($row['titre']) . '</h3>';
        echo '<p class="date">' . htmlspecialchars($row['date_publication']) . '</p>';
        echo '<p>' . nl2br(htmlspecialchars($row['contenu'])) . '</p>';
        echo '</div>';
    }
    echo '</div>';
} catch (PDOException $e) {
    echo "<p>Erreur de connexion à la base de données.</p>";
}
?>