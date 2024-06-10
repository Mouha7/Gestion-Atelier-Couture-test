<?php
namespace Macbook\Models;

use Macbook\Core\Model;

class UserModel extends Model
{
    public function __construct() {
        parent::getConnexion();
        $this->table = "utilisateur";
    }

    public function findByLoginAndPassword(string $login, string $password) {
        return $this->executeSelect("SELECT * FROM $this->table u, role r where u.roleId = r.idRole and u.login like '$login' and u.password like '$password';", true);
    }
}
