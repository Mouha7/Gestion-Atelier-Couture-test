<?php
require_once("../models/article.model.php");
if(isset($_REQUEST["action"])) {
    if($_REQUEST["action"] == "liste") {
        listArticle();
    } 
    elseif($_REQUEST["action"] == "form-new-article") {
        chargerForm();
    }
}
else {
    listArticle();
}
function listArticle():void {
    $articles_array = findAll();
    $categorie_array = findAllCategorie();
    $type_array = findAllType();
    require_once("../views/articles/liste.html.php");
}

function chargerForm():void {
    $categorie_array = findAllCategorie();
    $type_array = findAllType();
    require_once("../views/articles/form.new.article.html.php");
}


