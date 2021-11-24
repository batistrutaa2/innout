<?php
session_start();
loadModel('login');
$exception = null;

if (count($_POST) > 0) {
    $login = new Login($_POST);
    try {
       $user = $login->chechLogin();
       $_SESSION['user'] = $user;
       echo "Usuario {$user->name} Logado";
        header("location: dayRecordsController.php");
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' =>  $exception ]);
