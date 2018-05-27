<?php
/**
 * Entite User MANQUE TYPE **************************************
 */


class User {
    private $id;
    private $username;
    private $password;
    private $type;
    private $email;

    public function __construct($id=null,$username=null,$password=null,$email=null,$type=null) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->type = $type;
        
    }


    public function to_json(){

        $array = array(
            "id" => $this->id,
            "email" => $this->email,
            "password" => $this->password,
            "username" => $this->username,
            "type" => $this->type
        );

        return json_encode($array);
    }

    //Accesseurs
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getType() {
        return $this->type;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}