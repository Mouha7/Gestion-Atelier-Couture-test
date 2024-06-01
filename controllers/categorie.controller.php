<?php
require_once("../models/categorie.model.php");
require_once("../core/Controller.php");

loadCategorie();
function loadCategorie()
{
    if (isset($_REQUEST["action"])) {
        if ($_REQUEST["action"] == "liste") {
            listCategorie();
        } elseif ($_REQUEST["action"] == "save-categorie") {
            unset($_REQUEST["action"]);
            unset($_REQUEST["controller"]);
            storeCategorie($_REQUEST);
            redirectToRouter("controller=categorie&action=liste");
        } elseif ($_REQUEST["action"] == "delete-categorie") {
            supprimerCategorie($_REQUEST["idCategorie"]);
            redirectToRouter("controller=categorie&action=liste");
        } elseif ($_REQUEST["action"] == "detail-categorie") {
            detailsCategorie($_REQUEST["idCategorie"]);
        } elseif ($_REQUEST["action"] == "update-categorie") {
            unset($_REQUEST["action"]);
            unset($_REQUEST["controller"]);
            modifyCategorie($_REQUEST);
            redirectToRouter("controller=categorie&action=liste");
        }
    }
}

function listCategorie()
{
    renderView("../views/categories/liste", ["categorie_array" => findAllCategorie()]);
}

function storeCategorie(array $data)
{
    saveCategorie($data);
}

function detailsCategorie($value)
{
    renderView("../views/categories/update", ["categorie" => findOneCategorie($value)]);
}

function modifyCategorie(array $data)
{
    updateCategorie($data);
}

function supprimerCategorie($value)
{
    deleteCategorie($value);
}
