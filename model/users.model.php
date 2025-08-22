<?php
require_once "connection.php";

class UsersModel{
    static public function MdlShowUsers($table,$item,$value){

        if ($item != null) {
            $respConection = Connection::connectionBD()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $respConection->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $respConection->execute();
            return $respConection->fetch();
        } else {
            $respConection = Connection::connectionBD()->prepare("SELECT * FROM $table");
            $respConection->execute();
            return $respConection->fetchAll();
        }

        $respConection -> close();//close the conection
        $respConection = null;
    }

    static public function MdlInsertUser($ntable,$inf){
        echo $ntable;
        $respConection = Connection :: connectionBD() -> prepare("INSERT INTO $ntable(nombre, usuario, password, perfil, foto) VALUES (:nombre,:usuario,:password,:perfil,:foto)");
        $respConection->bindParam(":nombre",$inf["nombre"], PDO::PARAM_STR);
        $respConection->bindParam(":usuario",$inf["usuario"], PDO::PARAM_STR);
        $respConection->bindParam(":password",$inf["password"], PDO::PARAM_STR);
        $respConection->bindParam(":perfil",$inf["perfil"], PDO::PARAM_STR);
        $respConection->bindParam(":foto",$inf["urlImage"], PDO::PARAM_STR);
        echo $inf["nombre"];

        if ($respConection->execute()) {
            return "ok";
        }else{
            return "error";
        }
        $respConection->close();
        $respConection = null;
    }

    static public function mdlEditUser($ntable, $inf){
        $respConection = Connection :: connectionBD() -> prepare("UPDATE $ntable SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");
        $respConection->bindParam(":nombre",$inf["nombre"], PDO::PARAM_STR);
        $respConection->bindParam(":usuario",$inf["usuario"], PDO::PARAM_STR);
        $respConection->bindParam(":password",$inf["password"], PDO::PARAM_STR);
        $respConection->bindParam(":perfil",$inf["perfil"], PDO::PARAM_STR);
        $respConection->bindParam(":foto",$inf["urlImage"], PDO::PARAM_STR);

        if ($respConection ->execute()) {
            return "ok";
        }else{
            return "error";
        }

        $respConection->close();
        $respConection = null;
    }
}