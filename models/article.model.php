<?php
require_once "../core/Model.php";

class ArticleModel extends Model
{
    public function __construct()
    {
        $this->getConnexion();
        $this->table = "article";
    }

    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM `article` a, categorie c, type t WHERE a.typeId = t.idType and a.categorieId = c.idCategorie;");
    }

    public function save(array $data): void
    {
        extract($data);
        $this->executeUpdate("INSERT INTO `article` (`libelle`, `prixAppro`, `qteStock`, `typeId`, `categorieId`) VALUES ('$libelle', '$prixAppro', '$qteStock', '$typeId', '$categorieId')");
    }

    public function findOne($value): array|false
    {
        return $this->executeSelect("SELECT * FROM `article` WHERE `article`.`idArticle` = $value", true);
    }

    public function update(array $data): void
    {
        extract($data);
        $this->executeUpdate("UPDATE `article` t SET `libelle` = '$libelle', `prixAppro`= $prixAppro, `qteStock`= $qteStock, `typeId`= $typeId, `categorieId`= $categorieId WHERE t.idArticle = $idArticle");
    }

    public function delete($value): void
    {
        $this->executeUpdate("DELETE FROM article WHERE `article`.`idArticle` = $value");
    }
}
