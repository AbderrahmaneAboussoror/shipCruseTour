<?php

class cruiseController{
    public function searchController(){
        $var = cruise::search($_POST['search']);
        if ($var != 'error')
            return $var;
        else
            echo ($var);
    }
}