<?php
session_start();
require_once("./db.php");
$ob = new OperacijeBaze();
echo json_encode($ob->sviKorisniciMenadzer()->fetch_all());
?>
