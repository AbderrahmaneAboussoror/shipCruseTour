<?php

class cruise{
    static public function getAllCruises(){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    static public function getCruise($id){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere where id_croisiere = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return  $stmt->fetch();
    }
}