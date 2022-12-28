<?php

class Instances{
    public static function adminCheckInstance(){
        if(isset($_POST['submit'])){
            if(isset($_POST['email']) and isset($_POST['password'])){
                $adminCheck = new userController();
                $adminCheck->checkUser();
            }
        }
    }
    
    public static function deconnexion()
    {
        $_SESSION['login'] = false;
        $_SESSION['loginAdmin'] = false;
        header("location:login");
    }
}