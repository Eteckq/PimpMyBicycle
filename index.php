<?php
session_start();

require_once('controller/ConnectionController.php');

require_once('controller/UserController.php');
require_once('controller/DefaultController.php');

//var_dump($_POST);

$page = isset($_GET['page']) ? $_GET['page'] : "accueil";
$action = isset($_GET['action']) ? $_GET['action'] : "list";
$id = isset($_GET['id']) ? $_GET['id'] : "0";
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;


if($userId){ //Si le user est connecté
    $userController = new UserController();

    switch ($page) {
        case "preview":
            switch ($action) {
                case "view":
                    $userController->getBike($id);
                    break;
                case "getElements":
                    $userController->getElements();
                    break;
                case "getBike":
                    $userController->getBike($id);
                    break;
                case "saveBike":
                    $userController->saveBike($_POST["data"]);
                    break;
                case "editBike":
                    $userController->editBike($id,$_POST["data"]);
                    break;
                case "viewBike":
                    $userController->viewBike($id);
                    break;
                default:
                    $userController->editor();
                    break;
            }
            break;
        case "bikes":
            $userController->bikes();
            break;
        case "about":
            $userController->about();
            break;
        case "faq":
            $userController->faq();
            break;
        default:
            $userController->home();
            break;

    }


} else {
    $defaultController = new DefaultController();
    switch ($page) {
        case "faq":
            $defaultController->faq();
            break;
        case "login":
            $connectionController = new ConnectionController();
            $connectionController->login();
            break;
        case "connect":
            $connectionController = new ConnectionController();
            $connectionController->connect($_POST["pseudo"],$_POST["password"],$_POST["remember"]);
            break;
        case "register":
            $connectionController = new ConnectionController();
            $connectionController->register();
            break;
        case "create":
            $connectionController = new ConnectionController();
            $connectionController->create($_POST["pseudo"],$_POST["password"]);
            break;
        case "bikes":
            $defaultController->bikes();
            break;
        case "about":
            $defaultController->about();
            break;
        case "preview":
            $connectionController = new ConnectionController();
            $connectionController->register();
            break;
        default:
            $defaultController->home();
            break;
    }
}