<?php

include '../dao/ConexionBD.php';
include '../bo/ClsPublication.php';

if (isset($_REQUEST['id'])) {
    $dao = new ConexionBD();
    $pub = $dao->buscarPublication();
    $cont = $pub->getCount();
    $pub->setCount($cont+1);
    $dao->UpdateCount($pub);
}



