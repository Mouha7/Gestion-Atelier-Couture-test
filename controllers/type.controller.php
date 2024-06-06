<?php
require_once("../models/type.model.php");
require_once("../core/Controller.php");

class TypeController extends Controller
{
    private TypeModel $typeModel;
    public function __construct()
    {
        parent::__construct();
        $this->typeModel = new TypeModel();
        $this->load();
    }
    public function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste") {
                $this->listType();
            } elseif ($_REQUEST["action"] == "save-type") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                $this->store($_REQUEST);
                parent::redirectToRouter("controller=type&action=liste");
            } elseif ($_REQUEST["action"] == "delete-type") {
                $this->supprimer($_REQUEST["idType"]);
                $this->redirectToRouter("controller=type&action=liste");
            } elseif ($_REQUEST["action"] == "detail-type") {
                $this->details($_REQUEST["idType"]);
            } elseif ($_REQUEST["action"] == "update-type") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                $this->modify($_REQUEST);
                $this->redirectToRouter("controller=type&action=liste");
            }
        }
    }
    private function listType()
    {
        $this->renderView("../views/types/liste", ["type_array" => $this->typeModel->findAll()]);
    }

    private function store(array $data)
    {
        Validator::isEmpty($data["nomType"], "nomType");
        if (Validator::isValid()) {
            $type = $this->typeModel->findByName("nomType", $data["nomType"]);
            if ($type) {
                Validator::add("nomType", "La valeur existe déjà!");
                Session::add("errors", Validator::$errors);
            } else {
                $this->typeModel->save($data);
            }
        } else {
            Session::add("errors", Validator::$errors);
        }
    }

    private function details($value)
    {
        $this->renderView("../views/types/update", ["type" => $this->typeModel->findOne($value)]);
    }

    private function modify(array $data)
    {
        $this->typeModel->update($data);
    }

    private function supprimer($value)
    {
        $this->typeModel->delete($value);
    }
}
