<?php
require_once("../models/article.model.php");
require_once("../models/categorie.model.php");
require_once("../models/type.model.php");
require_once("../core/Controller.php");

class ArticleController extends Controller {
    private ArticleModel $articleModel;
    private TypeModel $typeModel;
    private CategorieModel $categorieModel;

    public function __construct() {
        parent::__construct();
        if(!Autorisation::isConnect()) {
            $this->redirectToRouter("controller=security&action=show-form");
        }
        $this->articleModel = new ArticleModel();
        $this->typeModel = new TypeModel();
        $this->categorieModel = new CategorieModel();
        $this->load();
    }

    public function load() {
        if(isset($_REQUEST["action"])) {
            if($_REQUEST["action"] == "liste") {
                $this->listArticle();
            } elseif($_REQUEST["action"] == "form-new-article") {
                $this->chargerForm();
            } elseif($_REQUEST["action"] == "save-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["btnSave"]);
                $this->store($_REQUEST);
            } elseif ($_REQUEST["action"] == "delete-article") {
                $this->supprimer($_REQUEST["idArticle"]);
                $this->redirectToRouter("controller=article&action=liste");
            } elseif ($_REQUEST["action"] == "detail-article") {
                $this->details($_REQUEST["idArticle"]);
            } elseif ($_REQUEST["action"] == "update-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                $this->modify($_REQUEST);
                $this->redirectToRouter("controller=article&action=liste");
            }
        }
        else {
            $this->listArticle();
        }
    }

    private function listArticle():void {
        $this->renderView("../views/articles/liste", ["articles_array"=> $this->articleModel->findAll(), "categorie_array" => $this->categorieModel->findAll(), "type_array" => $this->typeModel->findAll()]);
    }

    private function chargerForm():void {
        $this->renderView("../views/articles/form.new.article", ["categorie_array" => $this->categorieModel->findAll(), "type_array" => $this->typeModel->findAll()]);
    }

    private function store(array $data):void {
        Validator::isEmpty($data["libelle"],"libelle");
        if(Validator::isValid()) {
            $libelle = $this->articleModel->findByName("libelle", $data["libelle"]);
            if($libelle) {
                Validator::add("libelle", "Le libelle existe déjà!");
                Session::add("errors", Validator::$errors);
            } else {
                $this->articleModel->save($data);
                $this->redirectToRouter("controller=article&action=liste");
            }
        } else {
            Session::add("errors", Validator::$errors);
        }
        $this->redirectToRouter("controller=article&action=form-new-article");
    }

    private function details($value) {
        $this->renderView("../views/articles/update", ["article" => $this->articleModel->findOne($value), "categorie_array" => $this->categorieModel->findAll(), "type_array" => $this->typeModel->findAll()]);
    }

    private function modify(array $data) {
        $this->articleModel->update($data);
    }

    private function supprimer($value)
    {
        $this->articleModel->delete($value);
    }
}



