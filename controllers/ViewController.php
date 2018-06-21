<?php

class ViewController extends Controller {

    public function listeUtilisateurs() {

        $dao = new DAOUser();
        $result = $dao->getAll();

        $datas = array(
            "users" => $result
        );

       $this->render("listeUsers",$datas);
    }
}