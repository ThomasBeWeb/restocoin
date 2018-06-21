<?php

class UserController extends Controller {

    private $user;

    function __construct(){
        parent::__construct();
        //Creation d'un DAOuser
        $this->user = new DAOUser();
    }

    public function getUser($id) {

        //Invoque de la methode retrieve sur le dao et retourne le resultat
        return $this->user->retrieve($id);

    }

    public function updateUser($id) {
        var_dump($this->post);
        //$this->user->update($id,$this->post);
    }

    public function deleteUser($id) {
        var_dump($this->user->update($id,$tab));
    }

    public function getAllUsers() {

       return $newDAOUser->getAll();
    }
}