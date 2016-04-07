<?php

include '../dao/ConexionBD.php';
$dao = new ConexionBD();
if (isset($_REQUEST['comentario'])) {
    
    $publication = $_REQUEST['publicacion'];
    $retorno = $dao->insertPublication($publication);
    echo $retorno;
}


