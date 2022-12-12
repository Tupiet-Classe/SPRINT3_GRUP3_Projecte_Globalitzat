<?php
class Activities{
    private $activity_id;
    private $activity_name;
    private $activity_description;
    private $courseID;
    private $start_date;
    private $final_date;
   
    /**Codigo para sobrecargar el constructor, dependiendo del numero de entradas que le pongamos
       Cargara un constructor o otro
    */
    function __construct()
    {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámtros tendrá un nombre de función
        //atendiendo al siguiente modelo __construct1() __construct2()...
        $funcion_constructor = '__construct' . $num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this, $funcion_constructor)) {
            //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }


    //Constructor principal para mostrar actividad
    function __construct1($activity_id)
    {
        $this->activity_id = $activity_id;
        include_once '../PHP/connexio.php';
        
        //definim la query com una variable
        $sql = "SELECT * FROM `activities` WHERE id_activity = $this->activity_id;";

        //enviem la query a la bbdd
        $result = $conn->query($sql);
        $result->fetch_object();

        $this->activity_id = $result->activity_id;
        $this->activity_name = $result->activity_name;
        $this->course_id = $result->course_id;
    
        //tancar connexioDB
        $conn->close();
    }



    //Constructor principal para crear actividad
    function __construct3($activity_name, $activity_description, $courseID)
    {
        $this->activity_name = $activity_name;
        $this->activity_description = $activity_description;
        $this->courseID = $courseID;
    }


    public function addActivityToDatabase(){
         //connexió a la bdd
         include_once '../PHP/connexio.php';
        
         //definim la query com una variable
         $sql = "INSERT INTO `activities` (name_activity, description_activity, id_course) VALUES ('$this->activity_name','$this->activity_description', $this->courseID)";
 
         //enviem la query a la bbdd
         $conn->query($sql);
     
         //tancar connexioDB
         $conn->close();
    }

    public function getIdActivity(){
        return $this->idActividad;
    }
    /**
     * getNotaActividad
     * 
     * @return void
     */
    public function getNotaActividad(){
        return $this->notaActividad;
    }
    /**
     * setIdActividad
     * 
     * @param mixed $idActividad
     * @return void
     */

    /*

    public function setIdActividad(){
        $this->idActividad = $idActividad;
}

    **/
    
    /**
     * setNotaActividad
     * 
     * @param mixed $notaActividad
     * @return void
     */

    /*
    
    public function setNotaActividad(){
        $this->notaActividad = $notaActividad;
    }

    **/

    /**
     * anadirActividad - Método que se utilizara para añadir una nueva actividad
     * 
     * @return void
     */
 
    /**
     * editarActividad - Método que se utilizara para editar una actividad
     * 
     * @return void
     */
    public function editarActividiad(){

    }
    /**
     * eliminarActividad - Método que se utilizara para eliminar una actividad
     * 
     * @return void
     */
    public function eliminarActividad(){

    }
    /**
     * mostrarActividad - Método que se utilizara para mostrar una actividad
     * 
     * @return void
     */
    public function mostrarActividad(){

    }
    /**
     * asignarActividad - Método que se utilizara para asignar una actividad
     * 
     * @return void
     */
    public function asignarActividad(){

    }
    /**
     * desasignarActividad - Método que se utilizara para desasignar una actividad
     * 
     * @return void
     */
    public function desasignarActividad(){

    }
    /**
     * calcularNotaFinal - Método que se utilizara para calcular la nota final
     * 
     * @return void
     */
    public function  calcularNotaFinal(){
        
    }
}
?>