<?php

class Activities{
    private $activity_id;
    private $activity_name;
    private $activity_description;
    private $category_id;
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

        //enviem la query a la bbdd i guardem el contingut a la variable $result
        $result = $conn->query($sql);
        //fem un objecte que conte l'informacio que extreiem de de result amb "fetch_object()"
        $obj = $result->fetch_object();

        $this->activity_name = $obj->name_activity;
        $this->activity_description = $obj->description_activity;
        $this->course_id = $obj->id_course;
    
        //tancar connexioDB
        $conn->close();
    }



    //Constructor principal para crear actividad
    function __construct3($activity_name, $activity_description, $category_id)
    {
        $this->activity_name = $activity_name;
        $this->activity_description = $activity_description;
        $this->category_id = $category_id;
    }


    public function addActivityToDatabase(){
         //connexió a la bdd
         include_once '../PHP/connexio.php';
        
         //definim la query com una variable
         $sql = "INSERT INTO `activities` (name_activity, description_activity, id_category) VALUES ('$this->activity_name','$this->activity_description', $this->category_id)";
 
         //enviem la query a la bbdd
         $conn->query($sql);
     
         //tancar connexioDB
         $conn->close();
    }

    public function getActivityId(){
        return $this->activity_id;
    }
    
    public function getActivityName(){
        return $this->activity_name;
    }

    public function getActivityDescription(){
        return $this->activity_description;
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

//Mètode show_deliveries
public function show_deliveries($activity_id){
    include "../PHP/connexio.php";
    //Select per a la taula
    $sql = "SELECT locate as 'localitzacio', grade as 'nota' , users.name_user as 'usuari', id_delivery as 'id' 
    FROM deliveries 
    INNER JOIN users
    ON deliveries.id_user = users.id_user
    WHERE id_activity = $activity_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //Mostrar una taula id usuari, nom arxiu (location), nota
        echo "
        <table class='table'>
            <thead>
                <tr>
                <th scope='col'>Usuari</th>
                <th scope='col'>Locate</th>
                <th scope='col'>Nota</th>
                <th scope='col'>Actualitzar nota</th>
                </tr>
            </thead>
        <tbody>
        ";

        while($row = $result->fetch_assoc()) {
            
            echo"
            <tr>
            <td id ='user'> $row[usuari] </td>
            <td> <a href='../../content/activities/$row[localitzacio]' download > $row[localitzacio] </a> </td>
            ";
            if(empty($row['nota'])) {
                echo"<td> Sense nota </td>";

            } else {
                echo"
                <td> $row[nota]</td>
                ";
            }
            


            echo "
            <td><button onclick='actualitzarId($row[id])' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-pen-to-square'></i></td>
            </button>
            <input type='hidden' id='idDelivery' value=''></td>
            </input>
            ";
        }

    
        echo"
        </tr>
        </tbody>
        </table>
        ";
    
    }
}
}

?>