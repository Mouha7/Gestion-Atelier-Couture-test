<?php

class Model {
    protected string $dsn = 'mysql:host=localhost:8889;dbname=gestion_atelier_couture';
    protected string $username = 'root';
    protected string $password = 'root';
    protected PDO|NULL $pdo= null;
    protected string $table;

    public function getConnexion():void {
        try {
            if ($this->pdo == null) {
                $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            }
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function closeConnexion():void {
        if ($this->pdo == null) {
            $this->pdo = null;
        }
    }

    public function executeSelect(string $sql, bool $fetch=false):array|false {
        try {
            $stmt = $this->pdo->query($sql);
            return $fetch?$stmt->fetch(PDO::FETCH_ASSOC):$stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function executeUpdate(string $sql):void {
        try {
            $this->pdo->exec($sql);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : '. $e->getMessage());
        }
    }

    public function findAll(): array|false
    {
        return $this->executeSelect("SELECT * FROM `$this->table`");
    }

    public function findByName(string $key, mixed $value): array|false {
        return $this->executeSelect("SELECT * from $this->table where $key like '$value'", true);
    }
}