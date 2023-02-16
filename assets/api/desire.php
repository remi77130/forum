<?php
require_once __DIR__ . '/../includes/init.php';
require_once  __DIR__ . '/../verif.php';
require_once __DIR__ . '/../model/repository/user.repository.php';
require_once __DIR__ . '/../model/repository/desire.repository.php';
if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        if ($_GET['action'] == "get") {
            return getDesire();
        }
    }
}

function getDesire()
{
    $response = array();
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $desire = DesireRepository::findById($_GET["id"]);
        if($desire){
            $response = $desire;
        }
    } else {
        $desires = DesireRepository::findAll();
        if($desires){
            $response = $desires;
        }
    }
    echo json_encode($response);
    return true;
}
