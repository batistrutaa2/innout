<?php

function requireValidSession()
{
    $user = $_SESSION['user'];

    if (!isset($user)) {
        header('location: loginController.php');
        exit();
    }
}