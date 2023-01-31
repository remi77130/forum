<?php
require_once __DIR__ . '/../includes/init.php';
require_once  __DIR__ . '/../verif.php';
require_once __DIR__ . '/../model/repository/like.repository.php';

if (isset($_SESSION['id']) and !empty($_SESSION['id'])) {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        if ($_GET['action'] == "like") {
            return like();
        }
        if ($_GET['action'] == "countLike") {
            return countLike();
        }
        if ($_GET['action'] == "hasLike") {
            return hasLike();
        }
    }
}

function like()
{
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        if (LikeRepository::hasLikeUser($_SESSION['id'], $_GET["id"])) {
            unlike();
            return;
        }
        LikeRepository::addLike($_SESSION['id'], $_GET["id"]);
        returnResponse("Like ok", array("like" => true, "unlike" => false, "counter" => LikeRepository::countLikeForUser($_GET["id"])));
        return;
    }
    returnResponse("Paramètre manquant", null, 400);
}

function unLike()
{
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        LikeRepository::removeLike($_SESSION['id'], $_GET["id"]);
        returnResponse("Unlike ok", array("like" => false, "unlike" => true, "counter" => LikeRepository::countLikeForUser($_GET["id"])));
    }
    returnResponse("Paramètre manquant", null, 400);
}

function countLike()
{
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $counter = LikeRepository::countLikeForUser($_GET["id"]);
        returnResponse("ok", $counter);
    }
    returnResponse("Paramètre manquant", null, 400);
}

function hasLike()
{
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $hasLike = LikeRepository::hasLikeUser($_SESSION['id'], $_GET["id"]);
        returnResponse("ok", $hasLike);
    }
    returnResponse("Paramètre manquant", null, 400);
}

function returnResponse($message, $datas = null, $code = 200)
{
    $response = array("message" => $message, "datas" => $datas);
    http_response_code($code);
    echo json_encode($response);
    exit;
}
