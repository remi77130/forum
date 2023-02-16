<?php
require_once __DIR__ . '/../includes/init.php';
require_once  __DIR__ . '/../verif.php';
require_once __DIR__ . '/../model/repository/user.repository.php';
require_once __DIR__ . '/../model/repository/desire.repository.php';
if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        if ($_GET['action'] == "getDesire") {
            return getDesire();
        }
        if ($_GET['action'] == "getWithDesire") {
            return getWithDesire();
        }
        if ($_GET['action'] == "updateDesire") {
            return updateDesire();
        }
    }
}

function getDesire()
{
    $response = array();
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $user = UserRepository::findById($_GET["id"]);
        if ($user) {
            $response["desire"] = DesireRepository::getForUser($user->getId());
        }
    }
    echo json_encode($response);
    return true;
}

function getWithDesire()
{
    $response = array();
    $response["users"] = UserRepository::findUsersWithDesire();
    echo json_encode($response);
    return true;
}

function updateDesire()
{
    $response = array();
    if (isset($_GET["user_id"]) && !empty($_GET["user_id"]) && $_SESSION['id'] == $_GET["user_id"] && isset($_GET["desire_id"]) && !empty($_GET["desire_id"])) {
        $user = UserRepository::findById($_GET["user_id"]);
        if ($user) {
            UserRepository::updateDesire($_GET["user_id"], $_GET["desire_id"]);
        }
    }
    echo json_encode($response);
    return true;
}
