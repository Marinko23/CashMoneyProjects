<?php
session_start();
if (!isset($_SESSION["auth"])) die();
require_once("./db.php");
$ob = new OperacijeBaze();
echo json_encode($ob->projekatPoId($_POST["id"]));
?>