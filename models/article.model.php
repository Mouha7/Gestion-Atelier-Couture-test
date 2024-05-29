<?php
function findAll(): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM `article` a, categorie c, type t WHERE a.typeId = t.id and a.categorieId = c.id;";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

function findAllCategorie(): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM `categorie`";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

function findAllType(): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM `type`";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}
