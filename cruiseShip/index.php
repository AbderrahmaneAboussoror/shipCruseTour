<?php
require_once("./views/includes/header.php");

require_once("autoload.php");

require_once("./controllers/homeController.php");

$home = new homeController();

$pages = array('home', 'about', 'search', 'login', 'contact', 'register');

$adminPages = array('dashboardCruise', 'dashboardPort', 'dashboardShip', 'add', 'update', 'delete');

if(isset($_GET['page'])){
    if(in_array($_GET['page'], $pages)){
        $home->index($_GET['page']);
        if($_GET['page'] != 'login' and  $_GET['page'] != 'register')
            require_once('./views/includes/footer.php');
    }
    elseif(in_array($_GET['page'], $adminPages))
        $home->adminPages($_GET['page']);
    else
        include('views/includes/error.php');
    
} else{
    $home->index('home');
    require_once('./views/includes/footer.php');
}
    