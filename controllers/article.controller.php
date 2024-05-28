<?php
require_once("../models/article.model.php");
if(isset($_REQUEST["action"])) {
    if($_REQUEST["action"] == "liste") {
        $array = findAll();
        require_once("../views/articles/liste.html.php");
    } elseif($_REQUEST["action"] == "form-new") {
        require_once("../views/articles/form.new.article.html.php");
    }
}
else {
    require_once("../views/articles/liste.html.php");
}
?>
