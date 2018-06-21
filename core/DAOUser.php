<?php
namespace BWB\CORE;

class DAOUser extends Dao {

    public function __contruct(){
        parent::__construct();
    }
    
    public function create($user){
        $sql = "INSERT INTO USER (username,password,email) VALUES ('"
        .$user->getUsername()."','"
        .$user->getPassword()."','"
        .$user->getEmail()."')";
        var_dump($sql);
        $this->pdo->query($sql)->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM USER WHERE ID = ".$id;
        $this->pdo->query($sql)->execute();
    }


    public function retrieve($id){
        $sql = "SELECT * FROM USER WHERE id=".$id;
        $result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        $user->setId($result['id']);
        $user->setEmail($result['email']);
        $user->setPassword($result['password']);
        $user->setUsername($result['username']);

        return $user;
    }

    //Update d'un user selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    public function update($idUser,$newValeurs){

        $sql = "UPDATE USER SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE id = " . $idUser;

        $this->pdo->query($sql)->execute();

    }

    public function getAll(){

        $sql = "SELECT * FROM USER";
        $results = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $users = array();

        foreach ($results as $result) {
            $user = new User();
            $user->setId($result['id']);
            $user->setEmail($result['email']);
            $user->setPassword($result['password']);
            $user->setUsername($result['username']);

            array_push($users,$user);
        }

        return $users;
    }

    public function getAllBy($filter){

        $request = "SELECT * FROM USER ";

        $i = 0;

        foreach ($filter as $key => $value) {
            if($i===0){
                $request .= "WHERE ";
            }else{
                $request .= "AND ";
            }
            $request .= $key."='".$value."'";
        }
        
        $users = array();
        $results = $this->pdo->query($request)->fetchAll();
        foreach ($results as $result) {
            $user = new User();
            $user->setId($result['id']);
            $user->setEmail($result['email']);
            $user->setPassword($result['password']);
            $user->setUsername($result['username']);

            array_push($users,$user);
        }

        return $users;

    }
}