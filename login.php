<?php
require('./folder.php');

    //Infos à POST

    $dataTab = array('username'=> $_POST['username'] ,'password'=> $_POST['password']);
    $data = json_encode($dataTab);

    //POST: http://php.net/manual/en/function.stream-context-create.php
    $context_options = array (
            'http' => array (
                'method' => 'POST',
                'header'=> "Content-type: application/json; charset=utf-8\r\n"
                    . "Content-Length: " . strlen($data) . "\r\n",
                'content' => $data
                )
            );

    $context = stream_context_create($context_options);
    $fp = fopen('https://whispering-anchorage-52809.herokuapp.com/verify', 'r', false, $context);

    $result = stream_get_contents($fp, -1, 0);

    fclose($fp);

    //Verif resultat

    if($result === "true"){   //Password OK
        setcookie("checked", "true", time()+3600);
        header("location: " . $GLOBALS['racine']);
    }else{
        echo showMeTheLoginPage();
    }