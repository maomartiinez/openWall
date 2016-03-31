<?php 
/** 
 * Esta clase modela el objeto publicacion y sus interacciones y restricciones
 */
Class Publication {

    private $idPublication;
    private $text_content;
    private $count;
    private $date;
    
    
    function __construct($idPublication, $text_content, $count, $date) {
        $this->idPublication = $idPublication;
        $this->text_content = $text_content;
        $this->count = $count;
        $this->date = $date;
    }
    
    function getIdPublication() {
        return $this->idPublication;
    }

    function getText_content() {
        return $this->text_content;
    }

    function getCount() {
        return $this->count;
    }

    function getDate() {
        return $this->date;
    }

    function setIdPublication($idPublication) {
        $this->idPublication = $idPublication;
    }

    function setText_content($text_content) {
        $this->text_content = $text_content;
    }

    function setCount($count) {
        $this->count = $count;
    }

    function setDate($date) {
        $this->date = $date;
    }



}
 ?>