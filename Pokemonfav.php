<?php

require('autoload.php');

$controller = new PokemonController();
if(!empty($_GET["destroy"])) {
    $controller->destroy($_POST["id"]);
} else if(!empty($_GET["update"])) {
    $controller->update($_POST);
} else if(!empty($_GET["edit"])) {
    $controller->edit($_GET["edit"]);
}else if (!empty($_GET["store"])) {
    $controller->store($_POST);
} else if (!empty($_GET["id"])) {
    $controller->show($_GET["id"]);
} else if (!empty($_GET["create"])) {
    $controller->create();
} else {
    $controller->index();
}