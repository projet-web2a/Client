<?php
require "../../entities/rdv.php";
require "../../core/rdvC.php";
$id=$_GET["idR"];
$ec= new RdvC();
$ec->SupprimerRdv($id);
//header('Location: ../front/dispalyRdvFront.php');
?>