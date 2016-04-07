<?php

include '../dao/ConexionBD.php';
$dao = new ConexionBD();
$publicaciones=$dao->getAllPublications();
echo json_encode($publicaciones);

