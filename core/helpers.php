<?php
function add_class_invalid(string $nameField) {
    echo isset(Session::get("errors")[$nameField])?"is-invalid":"";
}

function add_class_hidden(string $nameField) {
    echo !isset(Session::get("errors")[$nameField])?"hide":"";
}

function add_class_hidden_lien(string $nameField) {
    echo !Autorisation::hasRole($nameField)?"visually-hidden":"";
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