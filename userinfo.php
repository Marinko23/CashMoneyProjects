<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
echo json_encode($ob->infoUsera($_POST["id"])->fetch_assoc());
?>