<?php 
include("../dao/ConexionBD.php");
include("../bo/ClsPublication.php");

$conex = new ConexionBD();

echo "<pre>";
print_r($conex->getAllPublications());
echo "</pre>";

//Prueba de registro
//$publication = new Publication("","Mensaje de prueba", 2, "2016-03-15");
//$response = $conex->insertPublication($publication);

echo "<pre>";
print_r($response);
echo "</pre>";

 ?>