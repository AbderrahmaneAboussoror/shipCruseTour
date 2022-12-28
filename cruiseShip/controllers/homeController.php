<?php
class homeController{
    public function index($page){
        include("views/".$page.".php");
    }

    public function adminPages($page){
        include("views/admin/".$page.".php");
    }
}