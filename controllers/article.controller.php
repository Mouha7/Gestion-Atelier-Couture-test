<?php
require_once("../models/article.model.php");
require_once("../models/categorie.model.php");
require_once("../models/type.model.php");
require_once("../core/Controller.php");

load();

function load() {
        if(isset($_REQUEST["action"])) {
            if($_REQUEST["action"] == "liste") {
                listArticle();
            } elseif($_REQUEST["action"] == "form-new-article") {
                chargerForm();
            } elseif($_REQUEST["action"] == "save-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["btnSave"]);
                store($_REQUEST);
                redirectToRouter("controller=article&action=liste");
            } elseif ($_REQUEST["action"] == "delete-article") {
                supprimer($_REQUEST["idArticle"]);
                redirectToRouter("controller=article&action=liste");
            } elseif ($_REQUEST["action"] == "detail-article") {
                details($_REQUEST["idArticle"]);
            } elseif ($_REQUEST["action"] == "update-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                modify($_REQUEST);
                redirectToRouter("controller=article&action=liste");
            }
        }
        else {
            listArticle();
        }
    }

    function listArticle():void {
        renderView("../views/articles/liste", ["articles_array"=> findAll(), "categorie_array" => findAllCategorie(), "type_array" => findAllType()]);
    }

    function chargerForm():void {
        renderView("../views/articles/form.new.article", ["categorie_array" => findAllCategorie(), "type_array" => findAllType()]);
    }

    function store(array $data):void {
        save($data);
    }

    function details($value) {
        renderView("../views/articles/update", ["article" => findOne($value), "categorie_array" => findAllCategorie(), "type_array" => findAllType()]);
    }

    function modify(array $data) {
        update($data);
    }

    function supprimer($value)
    {
        delete($value);
    }




