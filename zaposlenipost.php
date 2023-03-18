<?php
session_start();
if (!isset($_SESSION["auth"])) die();
// echo "test";
require_once("./db.php");
$ob = new OperacijeBaze();
echo json_encode($ob->stavkaPoId($_POST["id"]));
?>