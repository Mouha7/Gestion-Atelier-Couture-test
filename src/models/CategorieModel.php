<?php

namespace Macbook\Models;

use Macbook\Core\Model;



class CategorieModel extends Model
{
    public function __construct()
    {
        $this->getConnexion();
        $this->table = "categorie";
    }

    public function save(array $data): void
    {
        extract($data);
        $this->executeUpdate("INSERT INTO `categorie` (`nomCategorie`) VALUES ('$nomCategorie');");
    }

    public function findOne($value): array|false
    {
        return $this->executeSelect("SELECT * FROM `categorie` WHERE `categorie`.`idCategorie` = $value", true);
    }

    public function update(array $data): void
    {
        extract($data);
        $this->executeUpdate("UPDATE `categorie` t SET `nomCategorie` = '$nomCategorie' WHERE t.idCategorie = $idCategorie");
    }

    public function delete($value): void
    {
        $this->executeUpdate("DELETE FROM categorie WHERE `categorie`.`idCategorie` = $value");
    }
}
