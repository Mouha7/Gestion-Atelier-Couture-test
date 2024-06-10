<?php

namespace Macbook\Controllers;

use Macbook\Core\Session;
use Macbook\Core\Validator;
use Macbook\Core\Controller;
use Macbook\Models\UserModel;


class SecurityController extends Controller
{
    private UserModel $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->layout = "login";
        $this->userModel = new UserModel();
        $this->load();
    }

    public function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "login") {
                $this->login($_REQUEST);
            } elseif ($_REQUEST["action"] == "show-form") {
                $this->showForm();
            } elseif ($_REQUEST["action"] == "logout") {
                $this->logout();
            }
        } else {
            $this->showForm();
        }
    }

    private function showForm()
    {
        $this->renderView("../views/security/form");
    }

    private function logout()
    {
        Session::closeSession();
        $this->redirectToRouter("controller=security&action=show-form");
    }

    private function login(array $data)
    {
        if (!Validator::isEmpty($data["login"], "login")) {
            Validator::isEmail($data["login"], "login");
        }
        Validator::isEmpty($data["password"], "password");
        if (Validator::isValid()) {
            $userConnect = $this->userModel->findByLoginAndPassword($data["login"], $data["password"]);
            if ($userConnect) {
                Session::add("userConnect", $userConnect);
                $this->redirectToRouter("controller=article&action=liste");
            } else {
                Validator::add("error_connection", "Utilisateur introuvable!");
                Session::add("errors", Validator::$errors);
            }
        } else {
            Session::add("errors", Validator::$errors);
        }
        $this->redirectToRouter("controller=security&action=show-form");
    }
}
