<?php
require_once "../controllers/users.controller.php";
require_once "../model/users.model.php";

class AjaxUser
{
    // edit user
    public $idUser;
    public function ajaxEditUser()
    {
        $item = "id";
        $value = $this->idUser;
        $resp = UsersController::ctrShowAllUsers($item, $value);

        echo json_encode($resp);
    }
}

if (isset($_POST["idUser"])) {
    $edit = new AjaxUser();
    $edit->idUser = $_POST["idUser"];
    $edit->ajaxEditUser();
}

?>