<?php
require_once "connection.php";

class UsersModel{
    static public function MdlShowUsers($table,$item,$value){
        $respConection = Connection :: connectionBD() -> prepare("SELECT * FROM $table WHERE $item = :$item");
        $respConection -> bindParam(":".$item,$value, PDO::PARAM_STR);
        $respConection -> execute();
        return $respConection ->  fetch();
    }
}