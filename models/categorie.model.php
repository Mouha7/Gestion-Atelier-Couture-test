<?php

class CategorieModel
{
    public function findAll(): array
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

    public function save(array $data): void {
        $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
        $user = 'root';
        $password = 'root';
        try {
            $pdo = new PDO($dsn, $user, $password);
            $sql = "INSERT INTO `categorie` (`nomCategorie`) VALUES (:nomCategorie);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nomCategorie", $data["nomCategorie"]);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function findOne($value): array
    {
        $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
        $user = 'root';
        $password = 'root';
        try {
            $pdo = new PDO($dsn, $user, $password);
            $sql = "SELECT * FROM `categorie` WHERE `categorie`.`idCategorie` = $value";
            $stmt = $pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function update(array $data): void
    {
        $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
        $user = 'root';
        $password = 'root';
        try {
            $id = $data["idCategorie"];
            $nomCategorie = $data["nomCategorie"];
            $pdo = new PDO($dsn, $user, $password);
            $sql = "UPDATE `categorie` t SET `nomCategorie` = '$nomCategorie' WHERE t.idCategorie = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function delete($value): void
    {
        $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
        $user = 'root';
        $password = 'root';
        try {
            $pdo = new PDO($dsn, $user, $password);
            $sql = "DELETE FROM categorie WHERE `categorie`.`idCategorie` = $value";
            $pdo->exec($sql);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}
