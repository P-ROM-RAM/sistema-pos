<?php

class UsersController{
    public function ctrLoginUser(){
        if(isset($_POST["logUser"])){
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["logUser"]) &&
               preg_match('/^[a-zA-Z0-9]+$/',$_POST["passUser"])){

                $table = "usuarios";
                $item = "usuario";
                $value = $_POST["logUser"];

                $resp = UsersModel :: MdlShowUsers($table,$item,$value);

                // var_dump($resp);
                if ($resp["usuario"] == $_POST["logUser"] && $resp["password"] == $_POST["passUser"]){
                    $_SESSION["sesionActive"] = "ok";
                    echo '<script>
                    window.location = "start";
                    </script>';
                }else{
                    echo '<br><div class="alert alert-danger">ERROR TRY AGAIN</div>';
                }
            }
        }
    }
}