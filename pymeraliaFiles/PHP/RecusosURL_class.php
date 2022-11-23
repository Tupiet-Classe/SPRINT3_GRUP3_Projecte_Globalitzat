<?php
include("../PHP/connexio.php");
include("../PHP/databaseFunctions.php");
class Recursos{
    private $idRecurso;
    private $nombreRecurso;

    /** Constructor de la clase Recursos */    
    /**
     * __construct
     *
     * @param  mixed $idRecurso
     * @param  mixed $nombreRecurso
     * @return void
     */
    public function __construct($idRecurso){
        $this->idRecurso = $idRecurso;
    }

    /** getter Id Recurso */    
    /**
     * getIdRecurso
     *
     * @return void
     */
    public function getIdRecurso(){
        return $this->idRecurso;
    }

    /** getter Nombre Recurso */    
    /**
     * getNombreRecurso
     *
     * @return void
     */
    public function getNombreRecurso(){
        return $this->nombreRecurso;
    }

    /** setter Id Recurso */    
    /**
     * setIdRecurso
     *
     * @param  mixed $idRecurso
     * @return void
     */
    public function setIdRecurso($idRecurso){
        $this->idRecurso = $idRecurso;
    }

    /** setter Nombre Recurso */    
    /**
     * setNombreRecurso
     *
     * @param  mixed $nombreRecurso
     * @return void
     */
    public function setNombreRecurso($nombreRecurso){
        $this->nombreRecurso = $nombreRecurso;
    }

    /** Método que añade un recurso nuevo */    
    /**
     * addRecursos
     *
     * @return void
     */
    public function addRecursos(){

    }

    /** Método que edita un recurso existente */    
    /**
     * editRecursos
     *
     * @return void
     */
    public function editRecursos(){

    }

    /** Método que envia a la papelera un recurso existente */    
    /**
     * deleteRecursos
     *
     * @return void
     */
    public function papeleraRecursos(){
        $today = date("m-d-y");  

        $sql = "UPDATE resource_url  SET hidden = $today where id_resource_url = $this -> idRecurso";
        
        return db_query($sql);
    }

    /** Método que elimina un recurso existente */    
    /**
     * deleteRecursos
     *
     * @return void
     */
    public function deleteRecursos(){

        $sql = "DELETE from resource_url WHERE id_resource_url = $this -> idRecurso";
        
        return db_query($sql);
    }

    /** Método que muestra un recurso existente */    
    /**
     * showRecursos
     *
     * @return void
     */
    public static function showRecursos(){
        $sql = "SELECT name_recource_url from resources_url "; 
        $db=db_query($sql);
        return $db;
    }


    
    function edit($form_data){
        $sql = "UPDATE resources_url SET ";
        $data = array();
    
        foreach($form_data as $column=>$value){
    
            $data[] =$column."="."'".$value."'";
    
        }
        $sql .= implode(',',$data);
        $sql.=" where id_resource_url = $this -> idRecurso";
        return db_query($sql); 
    }

    /** Método que asigna un recurso */    
    /**
     * assignRecurso
     *
     * @return void
     */
    public function assignRecurso(){

    }

    /** Método que desasigna un recurso */    
    /**
     * unassignRecurso
     *
     * @return void
     */
    public function unassignRecurso(){

    }
}
?>