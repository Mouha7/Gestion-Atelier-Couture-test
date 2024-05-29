<?php
class Controller {
    public function redirectToRouter(string $path) {
        header("location".WEBROOT."?$path");
        exit;
    }
    
    public function renderView(string $view, array $data = []) {
        extract($data);
        require_once("$view.html.php");
    }
}