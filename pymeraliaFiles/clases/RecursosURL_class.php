<?php
include("../PHP/databaseFunctions.php");
class Recursos{
    private $idRecurso;
    private $titulo;
    private $descripcion;
    private $image;
    private $type;
    private $idCategoria;

    /** Constructor de la clase Recursos */    
    /**
     * __construct
     *
     * @param  mixed $idRecurso
     * @param  mixed $titulo
     * @return void
     */
    function __construct()
	{
		//obtengo un array con los parámetros enviados a la función
		$params = func_get_args();
		//saco el número de parámetros que estoy recibiendo
		$num_params = func_num_args();
		//cada constructor de un número dado de parámtros tendrá un nombre de función
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcion_constructor ='__construct'.$num_params;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcion_constructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}
    public function __construct2($idRecurso, $type){
        $this->idRecurso = $idRecurso;
        $this->type = $type;

    }
    public function __construct3($titulo,$descripcion, $type){
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->type = $type;
    }
    public function __construct4($titulo,$descripcion, $type, $idCategoria){
        $this->titulo = $titulo;
        $this->type = $type;

        if ($type == 'file') {
            $this->image = $descripcion;
        } else {
            $this->descripcion = $descripcion;
        }
        $this->idCategoria = $idCategoria;
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
     * gettitulo
     *
     * @return void
     */
    public function gettitulo(){
        return $this->titulo;
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
     * settitulo
     *
     * @param  mixed $titulo
     * @return void
     */
    public function settitulo($titulo){
        $this->titulo = $titulo;
    }

    /** Método que añade un recurso nuevo */    
    /**
     * addRecursos
     *
     * @return void
     */
    public function addRecursos(){
        
        if($this->type == 'url'){
            $sql="INSERT INTO resources_url(name_resource_url, location, id_category) VALUES('$this->titulo','$this->descripcion', $this->idCategoria)";
        
            return db_query($sql);
        }elseif($this->type == 'file'){
            $file_name = $this->uploadFile();
            $sql="INSERT INTO resources_files(name_resource_file, location, id_category) VALUES('$this->titulo','$file_name', $this->idCategoria)";
        
            return db_query($sql);
        }elseif($this->type == 'text'){
            $sql="INSERT INTO resources_text(name_resource_text, description_resource_text, id_category) VALUES('$this->titulo','$this->descripcion', $this->idCategoria)";
        
            return db_query($sql);
        } 
    }

    public function uploadFile() {
        $image = $this->image;

        // Recuperem el nom, tipus i mida de la imatge
        $image_name = $image['name'];
        $image_type = $image['type'];
        $image_size = $image['size'];

        // Ruta on guardarem les imatges
        $route = '../content/resources/'; 

        // Generem un hash aleatori
        $hash = bin2hex(random_bytes(32));

        // Guardem el nom de l'arxiu amb el hash
        $final_file_name = $hash.'_'.$image_name;

        // Definim el tipus d'arxiu que acceptem (només imatges JPG/JPEG i PNG)
        $allowed_types = array("image/jpg" , "image/jpeg" , "image/png", "application/pdf", "application/zip");

        // Si el directori on anem a guardar les dades no existeix, crea'l
        if(!is_dir($route)){
            mkdir($route, 0755);
        }

        // Si l'arxiu té el format correcte i pesa menys d'1MB, penjarem l'arxiu al servidor
        if (in_array($image_type, $allowed_types) && $image_size <= 1000000) {
            move_uploaded_file($image['tmp_name'], $route . $final_file_name);
        }

        return $final_file_name;
    }
    

    /** Método que edita un recurso existente */    
    /**
     * editRecursos
     *
     * @return void
     */
    public function editRecursos($title, $description){
        include_once "../PHP/connexio.php";
        $id = $this->idRecurso;
        switch ($this->type) {
            case 'text':
                $updateQuery = $conn->prepare("UPDATE resources_text SET name_resource_text = ?, description_resource_text = ? WHERE id_resource_text = ?");
                $updateQuery->bind_param('ssi', $title, $description, $id);
                $updateQuery->execute();
                break;
            case 'url':
                $updateQuery = $conn->prepare("UPDATE resources_url SET name_resource_url = ?, location = ? WHERE id_resource_url = ?");
                $updateQuery->bind_param('ssi', $title, $description, $id);
                $updateQuery->execute();
                break;
            
        }
    }

    /** Método que envia a la papelera un recurso existente */    
    /**
     * deleteRecursos
     *
     * @return void
     */
    public function papeleraRecursos(){
        $today = date("Y-m-d");  

        if($this->type == 'url'){
            $sql = "UPDATE resources_url  SET hidden = '$today' where id_resource_url = $this->idRecurso ";
        
            return db_query($sql);
        }elseif($this->type == 'file'){
            $sql = "UPDATE resources_files  SET hidden = '$today' where id_resource_file = $this->idRecurso ";
        
            return db_query($sql);
        }elseif($this->type == 'text'){
            $sql = "UPDATE resources_text  SET hidden = '$today' where id_resource_text = $this->idRecurso ";
        
            return db_query($sql);
        }
        
    }

    /** Método que elimina un recurso existente */    
    /**
     * deleteRecursos
     *
     * @return void
     */
    public function deleteRecursos(){

        $sql = "DELETE from resources_url WHERE id_resource_url = $this->idRecurso";
        
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