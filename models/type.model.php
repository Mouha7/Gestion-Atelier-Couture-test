<?php
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

function findOneType($value): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = "SELECT * FROM `type` WHERE `type`.`idType` = $value";
        $stmt = $pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

function saveType(array $data): void
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = "INSERT INTO `type` (`nomType`) VALUES (:nomType);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nomType", $data["nomType"]);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

function updateType(array $data): void
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $id = $data["idType"];
        $nomType = $data["nomType"];
        $pdo = new PDO($dsn, $user, $password);
        $sql = "UPDATE `type` t SET `nomType` = '$nomType' WHERE t.idType = $id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}

function deleteType($value): void
{
    $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    $user = 'root';
    $password = 'root';
    try {
        $pdo = new PDO($dsn, $user, $password);
        $sql = "DELETE FROM type WHERE `type`.`idType` = $value";
        $pdo->exec($sql);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}
