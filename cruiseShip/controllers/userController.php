<?php

class userController{

    public function checkUser(){
        $msgs = user::getUser($_POST['email'], $_POST['password']);
        $check = false;
        if($msgs != 'error'){
            if(isset($msgs))
                foreach($msgs as $msg)
                    if ($msg['role'] == 1){
                        header('location:dashboardCruise');
                        $_SESSION['loginAdmin'] = true;
                        $check = true;
                        break;
                    }
                    elseif($msg['role'] == 0){
                        header('location:search');
                        $_SESSION['login'] = true;
                        $check = true;
                        break;
                    }
                
            if(!$check)
                echo('email ou mot de pass invalide');
        } else
            echo ($msgs);
    }

    public function registerController(){
        $data = array(
            'nom' => $_POST['nom'],
            'p' => $_POST['prenom'],
            'email' => $_POST['email'],
            'pw' => $_POST['password']
        );

        $rep = user::register($data);
        if ($rep == 'ok')
            header('location:login');
        else
            echo $rep;
    }

}

class adminController{
    public function addCruiseController(){
        $data = array(
            'id_c' => $_POST['id_c'],
            'prix' => $_POST['prix'],
            'id_n' => $_POST['id_n'],
            'img' => $_POST['img'],
            'nbr' => $_POST['nbr'],
            'port' => $_POST['port'],
            'itrn' => $_POST['itrn'],
            'date' => $_POST['date'],
            'titre' => $_POST['titre'],
            'id_p' => $_POST['id_p']
        );
        $rep = admin::addCruise($data);
        if ($rep == 'ok')
            header('location:dashboardCruise');
        else
            echo $rep;
    }

    public function deleteCruiseController(){
        $rep = admin::deleteCruise($_POST['id_c']);
        if($rep == 'ok')
            header('location:dashboardCruise');
        else
            echo $rep;
    }

    public function addPortController(){
        $data = array(
            'id' => $_POST['id_p'],
            'nom' => $_POST['nom'],
            'p' => $_POST['p'],
        );
        $rep = admin::addPort($data);
        if ($rep == 'ok')
            header('location:dashboardCruise');
        else
            echo $rep;
    }

    public function deletePortController(){
        $rep = admin::deletePort($_POST['id_p']);
        if($rep == 'ok')
            header('location:dashboardPort');
        else
            echo $rep;
    }

    public function addShipController(){
        $data = array(
            'id' => $_POST['id_n'],
            'nom' => $_POST['nom'],
            'nc' => $_POST['nc'],
            'np' => $_POST['np']
        );
        $rep = admin::addShip($data);
        if ($rep == 'ok')
            header('location:dashboardShip');
        else
            echo $rep;
    }

    public function deleteShipController(){
        $rep = admin::deleteShip($_POST['id_n']);
        if($rep == 'ok')
            header('location:dashboardShip');
        else
            echo $rep;
    }
}