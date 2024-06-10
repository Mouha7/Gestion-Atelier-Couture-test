<?php
namespace Macbook\Core;

use Macbook\Api\TypeController as ApiTypeController;
use Macbook\Controllers\TypeController;
use Macbook\Controllers\ArticleController;
use Macbook\Controllers\SecurityController;
use Macbook\Controllers\CategorieController;

class Router
{
    public static function run()
    {
        $controller = null;
        if (isset($_REQUEST["controller"])) {
            if ($_REQUEST["controller"] == "article") {
                $controller = new ArticleController();
            } elseif ($_REQUEST["controller"] == "categorie") {
                $controller = new CategorieController();
            } elseif ($_REQUEST["controller"] == "api-type") {
                $controller = new ApiTypeController();
            } elseif ($_REQUEST["controller"] == "type") {
                $controller = new TypeController();
            } elseif ($_REQUEST["controller"] == "security") {
                $controller = new SecurityController();
            }
        } else {
            $controller = new SecurityController();
        }
    }
}
