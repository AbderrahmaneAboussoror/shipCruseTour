<?php
 class DB{
    static public function connecter(){
        $servername = 'localhost';
        $email = 'root';
        $password = '';
        $con = new PDO("mysql:host=$servername;dbname=cruiseship", $email, $password);
        $con->exec("set names utf8");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $con;
    }
 }