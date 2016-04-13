<?php

include '../dao/ConexionBD.php';
include '../bo/ClsPublication.php';
$dao = new ConexionBD();
$publicacionesGet=$dao->getAllPublications();
$publicaciones=array();
foreach ($publicacionesGet as $it) {
    if($it->count<3){
        $publicaciones[]=$it;
    }
}
echo json_encode($publicaciones);