<?php

class UsersController{
    static public function ctrLoginUser(){
        if(isset($_POST["logUser"])){
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["logUser"]) &&
               preg_match('/^[a-zA-Z0-9]+$/',$_POST["passUser"])){

                $table = "usuarios";
                $item = "usuario";
                $value = $_POST["logUser"];
                $encryptPass = crypt($_POST["passUser"],'$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/');

                $resp = UsersModel :: MdlShowUsers($table,$item,$value);

                // var_dump($resp);
                if ($resp["usuario"] == $_POST["logUser"] && $resp["password"] == $encryptPass){
                    $_SESSION["sesionActive"] = "ok";
                    $_SESSION["id"] = $resp["id"] ;
                    $_SESSION["name"] = $resp["nombre"] ;
                    $_SESSION["user"] = "usuario";
                    $_SESSION["profile"] = $resp["perfil"] ;
                    $_SESSION["photo"] = $resp["foto"] ;
                    echo '<script>
                    window.location = "start";
                    </script>';
                }else{
                    echo '<br><div class="alert alert-danger">ERROR TRY AGAIN</div>';
                }
            }
        }
    }

    static public function ctrCreateUser(){
        if (isset($_POST["name"])) {
            if (preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/",$_POST["name"])
                && preg_match("/^[a-zA-Z0-9]+$/",$_POST["nameUser"])
            && preg_match("/^[a-zA-Z0-9]+$/",$_POST["password"])) {

                // validate image
                $urlImage = "img/users/anonymous.png";
                if (isset($_FILES["newPhoto"]["tmp_name"])) {
                    list($width,$height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);
                    $newWidth = 500;
                    $newHeight = 500;
                    //dir save image
                    $dir = "img/users/".$_POST["nameUser"];
                    mkdir($dir,0755);
                    // if image is jpeg
                    if($_FILES["newPhoto"]["type"] ==  "image/jpeg"){
                        $random = mt_rand(100,999);
                        $urlImage = "img/users/".$_POST["nameUser"]."/".$random.".jpg";
                        $origin = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);
                        $destination = imagecreatetruecolor($newWidth,$newHeight);
                        imagecopyresized($destination,$origin,0,0,0,0,$newWidth,$newHeight,$width,$height);
                        imagejpeg($destination,$urlImage);
                    }
                    if($_FILES["newPhoto"]["type"] ==  "image/png"){
                        $random = mt_rand(100,999);
                        $urlImage = "img/users/".$_POST["nameUser"]."/".$random.".png";
                        $origin = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);
                        $destination = imagecreatetruecolor($newWidth,$newHeight);
                        imagecopyresized($destination,$origin,0,0,0,0,$newWidth,$newHeight,$width,$height);
                        imagepng($destination,$urlImage);
                    }
                }

                $encryptPass = crypt($_POST["password"],'$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/');
                $nameTable = "usuarios";
                $info = array(
                    "nombre" => $_POST["name"],
                    "usuario" => $_POST["nameUser"],
                    "password" => $encryptPass,
                    "perfil" => $_POST["profile"],
                    "urlImage" => $urlImage
                );

                $resp = UsersModel::MdlInsertUser($nameTable,$info);

                if ($resp == "ok") {
                    echo '<script>
                           Swal.fire({
                                title: "Successfully Registered User",
                                icon: "success",
                                draggable: true
                            }).then((result)=>{
                                if(result.value){
                                window.location = "users";
                                }
                            });
                        </script>';
                }
            }else{ echo '<script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!"
            }).then((result)=>{
                if(result.value){
                    window.location = "users";
                }
            });
            </script>';
            }
        }
    }

    static public function ctrShowAllUsers($item,$value){
        $table = "usuarios";
        $resp = UsersModel :: MdlShowUsers($table,$item,$value);
        return $resp;
    }

    static public function ctrEditUser(){
        if(isset($_POST["editUser"])){
            if (
                preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/", $_POST["editName"])
            ) {
                // image
                $urlImage = $_POST["currentPhoto"];
                if (isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])) {
                    list($width,$height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);
                    $newWidth = 500;
                    $newHeight = 500;
                    //dir save image
                    $dir = "img/users/".$_POST["editUser"];
                    // We first ask if a photo exists
                    if(!empty($_POST["currentPhoto"])){
                        unlink($_POST["currentPhoto"]);
                    }else{
                        mkdir($dir,0755);
                    }

                    // if image is jpeg
                    if($_FILES["editPhoto"]["type"] ==  "image/jpeg"){
                        $random = mt_rand(100,999);
                        $urlImage = "img/users/".$_POST["editUser"]."/".$random.".jpg";
                        $origin = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);
                        $destination = imagecreatetruecolor($newWidth,$newHeight);
                        imagecopyresized($destination,$origin,0,0,0,0,$newWidth,$newHeight,$width,$height);
                        imagejpeg($destination,$urlImage);
                    }
                    if($_FILES["editPhoto"]["type"] ==  "image/png"){
                        $random = mt_rand(100,999);
                        $urlImage = "img/users/".$_POST["editUser"]."/".$random.".png";
                        $origin = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);
                        $destination = imagecreatetruecolor($newWidth,$newHeight);
                        imagecopyresized($destination,$origin,0,0,0,0,$newWidth,$newHeight,$width,$height);
                        imagepng($destination,$urlImage);
                    }
                }
            }

            $nameTable = "usuarios";
            if($_POST["editPassword"] != ""){

                if (preg_match("/^[a-zA-Z0-9]+$/", $_POST["editPassword"])) {
                    $encryptPass = crypt($_POST["editPassword"], '$6$rounds=1000000$NJy4rIPjpOaU$0ACEYGg/aKCY3v8O8AfyiO7CTfZQ8/W231Qfh2tRLmfdvFD6XfHk12u6hMr9cYIA4hnpjLNSTRtUwYr9km9Ij/');
                } else{ echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!"
                        }).then((result)=>{
                            if(result.value){
                                window.location = "users";
                            }
                        });
                        </script>';
                }
            }else{
                $encryptPass = $_POST["currentPassword"];
            }
            $info = array(
                "nombre" => $_POST["editName"],
                "usuario" => $_POST["editUser"],
                "password" => $encryptPass,
                "perfil" => $_POST["editProfile"],
                "urlImage" => $urlImage
            );
            $info = UsersModel::mdlEditUser($nameTable, $info);

            if ($info == "ok") {
                echo '<script>
                           Swal.fire({
                                title: "Successfully Registered User",
                                icon: "success",
                                draggable: true
                            }).then((result)=>{
                                if(result.value){
                                window.location = "users";
                                }
                            });
                        </script>';
            }
        } else {
            echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "The name or it can be empty",
                            text: "Something went wrong!"
                        }).then((result)=>{
                            if(result.value){
                                window.location = "users";
                            }
                        });
                        </script>';
        }
    }
}