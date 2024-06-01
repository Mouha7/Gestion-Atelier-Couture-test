<?php

class ArticleModel
{
    public function findAll(): array
    {
        $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
        $user = 'root';
        $password = 'root';
        try {
            $pdo = new PDO($dsn, $user, $password);
            $sql = "SELECT * FROM `article` a, categorie c, type t WHERE a.typeId = t.idType and a.categorieId = c.idCategorie;";
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
            $sql = "INSERT INTO `article` (`libelle`, `prixAppro`, `qteStock`, `typeId`, `categorieId`) 
                    VALUES (:libelle, :prixAppro, :qteStock, :typeId, :categorieId)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':libelle', $data['libelle']);
            $stmt->bindParam(':prixAppro', $data['prixAppro']);
            $stmt->bindParam(':qteStock', $data['qteStock']);
            $stmt->bindParam(':typeId', $data['typeId']);
            $stmt->bindParam(':categorieId', $data['categorieId']);
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
            $sql = "SELECT * FROM `article` WHERE `article`.`idArticle` = $value";
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
            $id = $data["idArticle"];
            $libelle = $data["libelle"];
            $prixAppro = $data["prixAppro"];
            $qteStock = $data["qteStock"];
            $typeId = $data["typeId"];
            $categorieId = $data["categorieId"];
            $pdo = new PDO($dsn, $user, $password);
            $sql = "UPDATE `article` t SET `libelle` = '$libelle', `prixAppro`= $prixAppro, `qteStock`= $qteStock, `typeId`= $typeId, `categorieId`= $categorieId WHERE t.idArticle = $id";
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
            $sql = "DELETE FROM article WHERE `article`.`idArticle` = $value";
            $pdo->exec($sql);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}
