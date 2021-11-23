<?php
loadModel('login');
$exception = null;

if (count($_POST) > 0) {
    $login = new Login($_POST);
    try {
       $user = $login->chechLogin();
       echo "Usuario {$user->name} Logado";

    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' =>  $exception ]);
