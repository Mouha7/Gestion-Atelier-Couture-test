<?php
require_once("../models/type.model.php");
require_once("../core/Controller.php");

loadType();
function loadType()
{
    if (isset($_REQUEST["action"])) {
        if ($_REQUEST["action"] == "liste") {
            listType();
        } elseif ($_REQUEST["action"] == "save-type") {
            unset($_REQUEST["action"]);
            unset($_REQUEST["controller"]);
            storeType($_REQUEST);
            redirectToRouter("controller=type&action=liste");
        } elseif ($_REQUEST["action"] == "delete-type") {
            supprimerType($_REQUEST["idType"]);
            redirectToRouter("controller=type&action=liste");
        } elseif ($_REQUEST["action"] == "detail-type") {
            detailsType($_REQUEST["idType"]);
        } elseif ($_REQUEST["action"] == "update-type") {
            unset($_REQUEST["action"]);
            unset($_REQUEST["controller"]);
            modifyType($_REQUEST);
            redirectToRouter("controller=type&action=liste");
        }
    }
}
function listType()
{
    renderView("../views/types/liste", ["type_array" => findAllType()]);
}

function storeType(array $data)
{
    saveType($data);
}

function detailsType($value)
{
    renderView("../views/types/update", ["type" => findOneType($value)]);
}

function modifyType(array $data)
{
    updateType($data);
}

function supprimerType($value)
{
    deleteType($value);
}
