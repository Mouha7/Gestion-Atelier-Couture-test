<?php
function findAll(): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=nom_de_la_base';
    $user = 'root';
    $password = 'root';
    // Connexion à la base de données
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = 'SELECT * FROM `article`';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}
