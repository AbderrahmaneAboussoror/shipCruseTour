<?php

class cruise{
    static public function getAllCruises(){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere where YEAR(dateDepart) >= YEAR(NOW()) and DAY(dateDepart) >= DAY(NOW()) or MONTH(dateDepart) >= MONTH(NOW())");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    static public function getCruise($id){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere where id_croisiere = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return  $stmt->fetch();
    }

    static public function search($value){
        $stmt = DB::connecter()->prepare('SELECT * from croisiere c, croisiere_port cr, port p, navire v where c.id_navire = v.id_navire and c.id_croisiere = cr.id_croisiere and cr.id_port = p.id_port and( c.titre = :val or p.nom = :val or v.nom = :val)');
        $stmt->bindParam(':val', $value);
        if ($stmt->execute())
            return $stmt->fetchAll();
        else
            return 'error';
    }

    static public function byDate($value){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere where MONTH(dateDepart) = :val and YEAR(dateDepart) >= YEAR(NOW())");
        $stmt->bindParam(':val', $value);
        if ($stmt->execute())
            return $stmt->fetchAll();
        else
            return 'error';
    }

    static public function byShip($value){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere c, navire v where c.id_navire = v.id_navire and v.nom = :val and YEAR(c.dateDepart) >= YEAR(NOW())");
        $stmt->bindParam(":val", $value);
        if ($stmt->execute())
            return $stmt->fetchAll();
        else
            return 'error';
    }

    static public function byPort($value){
        $stmt = DB::connecter()->prepare("SELECT * from croisiere c, port p, croisiere_port cr where c.id_croisiere = cr.id_croisiere and cr.id_port = p.id_port and p.nom = :val and YEAR(c.dateDepart) >= YEAR(NOW())");
        $stmt->bindParam(":val", $value);
        if ($stmt->execute())
            return $stmt->fetchAll();
        else
            return 'error';
    }
}