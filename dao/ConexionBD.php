<?php 

Class ConexionBD{  

/** Constantes de conexión */
  const DB_HOST = 'localhost'; //Servidor
  const DB_USER = 'root'; //Usuario de la BD
  const DB_PASS = ''; // Password de la BD
  const DB_NAME = 'openwall'; //Nombre de la BD

  function __construct()
  {
    try {
      $this->pdoApp = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, 
                              self::DB_USER, 
                              self::DB_PASS,
                              array(
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                              ));
    }
    catch( PDOException $Exception ) {
        $error = $Exception->getMessage( ).', '.$Exception->getCode( );
        echo $error;
        die();
    }
    return $this->pdoApp;
  }

  /**
   * Realiza la consulta de todas las publicaciones.
   * @return [type] [description]
   */
  public function getAllPublications()
  {
    $query_select = "SELECT * FROM publication ORDER BY idpublication DESC"; 
    $statement = $this->pdoApp->prepare($query_select);
    $statement->execute();
    $rs_publications = array();


    while($publication = $statement->fetchObject()){
      $rs_publications[] = $publication;
    }

    if($rs_publications){
      return $rs_publications;
    }else{
      return null;
    }
  }

  /**
   * Inserta una nueva publicación
   * @param  Publication $publication: Objeto de tipo Publication
   * @return boolean: true o false
   */
  public function insertPublication($publication){
    $query_insert = "INSERT INTO publication(idpublication, text_content, count, date) VALUES (?,?,?,?)"; 

    try{
      $statement = $this->pdoApp->prepare($query_insert);
      $statement->bindParam(1, $publication->getIdPublication());
      $statement->bindParam(2, $publication->getText_content());
      $statement->bindParam(3, $publication->getCount());
      $statement->bindParam(4, $publication->getDate());
      $statement->execute();
        
    }catch( PDOException $Exception ) {
      $error = $Exception->getMessage( ).', '.$Exception->getCode( );
      echo $error;
      return false;
    }

    return true;
  }
  public function UpdateCount(ClsPublication $obj){
       $query_update = "UPDATE publication SET text_content='".$obj->getText_content()."',count =".$obj->getCount().", date='".$obj->getCount()."';";
       try{
      $statement = $this->pdoApp->prepare($query_update);
      $statement->execute();
      return true;
        
    }catch( PDOException $Exception ) {
      $error = $Exception->getMessage( ).', '.$Exception->getCode( );
      echo $error;
      return false;
    }
  }
  public function BuscarPublicacion($id){
      $query_select = "SELECT * FROM publication WHERE idpublication ="+$id+";"; 
       try{
      $statement = $this->pdoApp->prepare($query_select);
      $statement->execute();
      $publication = $statement->fetch();
      return $publication;
        
    }catch( PDOException $Exception ) {
      $error = $Exception->getMessage( ).', '.$Exception->getCode( );
      echo $error;
      return false;
    }
      
  }
  
}
?>