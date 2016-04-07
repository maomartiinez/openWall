<?php

include '../dao/ConexionBD.php';
include '../bo/ClsPublication.php';
$dao = new ConexionBD();
if (isset($_REQUEST['comentario'])) {    
    $publication = new Publication('', $_REQUEST['comentario'], 0, date("Y-m-d"));
    $retorno = $dao->insertPublication($publication);
    echo $retorno;
}


