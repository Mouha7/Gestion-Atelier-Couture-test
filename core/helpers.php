<?php
function add_class_invalid(string $nameField) {
    echo isset(Session::get("errors")[$nameField])?"is-invalid":"";
}

function dd(mixed $data) {
    dump($data);
    die();
}

function dump(mixed $data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}