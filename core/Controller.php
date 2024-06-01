<?php
function redirectToRouter(string $path)
{
    header("location:" . WEBROOT . "?$path");
    exit;
}

function renderView(string $view, array $data = [])
{
    extract($data);
    require_once("$view.html.php");
}
