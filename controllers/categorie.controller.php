<?php
require_once("../models/categorie.model.php");
require_once("../core/Controller.php");

class CategorieController extends Controller {
    private CategorieModel $categorieModel;

    public function __construct() {
        $this->categorieModel = new CategorieModel();
        $this->load();
    }

    public function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste") {
                $this->listCategorie();
            } elseif ($_REQUEST["action"] == "save-categorie") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                var_dump($_REQUEST);
                $this->store($_REQUEST);
                $this->redirectToRouter("controller=categorie&action=liste");
            } elseif ($_REQUEST["action"] == "delete-categorie") {
                $this->supprimer($_REQUEST["idCategorie"]);
                $this->redirectToRouter("controller=categorie&action=liste");
            } elseif ($_REQUEST["action"] == "detail-categorie") {
                $this->details($_REQUEST["idCategorie"]);
            } elseif ($_REQUEST["action"] == "update-categorie") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                $this->modify($_REQUEST);
                $this->redirectToRouter("controller=categorie&action=liste");
            }
        }
    }

    private function listCategorie()
    {
        $this->renderView("../views/categories/liste", ["categorie_array" => $this->categorieModel->findAll()]);
    }

    private function store(array $data)
    {
        $this->categorieModel->save($data);
    }

    private function details($value) {
        $this->renderView("../views/categories/update", ["categorie" => $this->categorieModel->findOne($value)]);
    }

    private function modify(array $data) {
        $this->categorieModel->update($data);
    }

    private function supprimer($value)
    {
        $this->categorieModel->delete($value);
    }
}
