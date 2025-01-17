<?php
$route = $_GET['route'] ?? 'accueilAdmin';
echo $route . "\n";
switch ($route){
    case 'accueilAdmin':
        require 'controller/controllerAmourOuf.php';
        $var = new Controller();
        $var->connexion_admin();
        break;
    case 'voirUsers':
        require 'controller/controllerAmourOuf.php';
        $users = new Controller();
        $users->get_all_users();
        break;
    case 'formulaires':
        require 'vueAdmin/GestionFormulaires.php';
        break;
    
    default:
        require 'view/erreur.php';
        break;
}
?>


