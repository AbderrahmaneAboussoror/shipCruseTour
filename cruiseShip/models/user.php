<?php

class user{
    public static function getUser($email, $pw){
        $stmt = DB::connecter()->prepare('SELECT * from utilisateur where email = :email and pw = :pw');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pw', $pw);
        if($stmt->execute())
            return $stmt->fetchAll();
        else
            return 'error';
        
    }

    public static function register($data){
        $stmt = DB::connecter()->prepare("INSERT INTO utilisateur(nom, prenom, email, pw, role) values(:n, :p, :email, :pw,". 0 .")");
        $stmt->bindParam(":n", $data['nom']);
        $stmt->bindParam(":p", $data['p']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":pw", $data['pw']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function checkPlaces($id){
        $stmt = DB::connecter()->prepare('SELECT nbrPlace from navire where id_navire = :id');
    }
}

class admin{
    public static function addCruise($data){
        $stmt = DB::connecter()->prepare("INSERT INTO croisiere(id_croisiere, id_navire, prix, image, nbrNuits, portDepart, itenairaire, 
        dateDepart, titre) values(:id_c, :id_n, :prix, :img, :nbrNuits, :portD, :iten, :dateD, :titre)");
        $stmt2 = DB::connecter()->prepare("INSERT INTO croisiere_port(id_croisiere, id_port) values(:id_c, :id_p)");
        $stmt->bindParam(":id_c", $data['id_c']);
        $stmt->bindParam(":prix", $data['prix']);
        $stmt->bindParam(":id_n", $data['id_n']);
        $stmt->bindParam(":img", $data['img']);
        $stmt->bindParam(":nbrNuits", $data['nbr']);
        $stmt->bindParam(":portD", $data['port']);
        $stmt->bindParam(":iten", $data['iten']);
        $stmt->bindParam(":dateD", $data['date']);
        $stmt->bindParam(":titre", $data['titre']);
        $stmt2->bindParam(":id_c", $data['id_c']);
        $stmt2->bindParam(":id_p", $data['id_p']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function deleteCruise($id){
        $stmt = DB::connecter()->prepare("DELETE from croisiere where id_croisiere = :id");
        $stmt->bindParam(":id", $id);
        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function updateCruise($data){
        $stmt = DB::connecter()->prepare("UPDATE croisiere SET id_navire = :id_n, prix = :prix, image = :img, nbrNuits = :nbrNuits, portDepart = :portD, itenairaire = :iten, dateDepart = :dateD, titre = :titre where id_croisiere = :id_c");
        $stmt->bindParam(":id_c", $data['id_c']);
        $stmt->bindParam(":prix", $data['prix']);
        $stmt->bindParam(":id_n", $data['id_n']);
        $stmt->bindParam(":img", $data['img']);
        $stmt->bindParam(":nbrNuits", $data['nbr']);
        $stmt->bindParam(":portD", $data['port']);
        $stmt->bindParam(":iten", $data['iten']);
        $stmt->bindParam(":dateD", $data['date']);
        $stmt->bindParam(":titre", $data['titre']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function addPort($data){
        $stmt = DB::connecter()->prepare("INSERT INTO port(id_port, nom, pays) values (:id, :n, :p)");
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":n", $data['nom']);
        $stmt->bindParam(":p", $data['p']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function deletePort($id){
        $stmt = DB::connecter()->prepare("DELETE from port where id_port = :id");
        $stmt->bindParam(":id", $id);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function updatePort($data){
        $stmt = DB::connecter()->prepare("UPDATE port SET nom = :n, pays = :p where id_port = :id");
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":n", $data['nom']);
        $stmt->bindParam(":p", $data['p']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function addShip($data){
        $stmt = DB::connecter()->prepare("INSERT INTO navire(id_navire, nom, nbrChambre, nbrPlace) values(:id, :n, :nc, :np)");
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":n", $data['nom']);
        $stmt->bindParam(":nc", $data['nc']);
        $stmt->bindParam(":np", $data['np']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function deleteShip($id){
        $stmt = DB::connecter()->prepare("DELETE FROM navire where id_navire = :id");
        $stmt->bindParam(":id", $id);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }

    public static function updateShip($data){
        $stmt = DB::connecter()->prepare("UPDATE navire set nom = :n, nbrChambre = :nc, nbrPlace = :np where id_navire = :id");
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":n", $data['nom']);
        $stmt->bindParam(":nc", $data['nc']);
        $stmt->bindParam(":np", $data['np']);

        if ($stmt->execute())
            return 'ok';
        else
            return 'error';
    }
}