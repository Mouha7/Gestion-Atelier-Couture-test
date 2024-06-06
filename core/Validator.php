<?php
class Validator {
    public static array $errors = [];

    public static function isEmpty(string $valueField, string $nameField, string $msg="Champ obligatoire!"):void {
        if(empty($valueField)) {
            self::$errors[$nameField] = $msg;
        }
    }

    public static function add(string $key, mixed $data)
    {
        self::$errors[$key] = $data;
    }


    public static function isValid():bool {
        return empty(self::$errors);
    }
}