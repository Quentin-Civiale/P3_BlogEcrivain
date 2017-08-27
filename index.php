<?php

session_start();
if(!isset($_SESSION['Auth'])){
    $_SESSION['Auth'] = false;
}

require 'Controleur/routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();
