<?php

class Connection{
    static public function connectionBD(){
        $link = new PDO("mysql:host=localhost;dbname=01sistemapos","root","");
        $link -> exec ("set names utf8");
        return $link;
    }
}