<?php
//Classe
class Deliver{
    private $deliver_id;
    private $activity_id;
    private $user_id;
    private $locate;

    private $deliver_file;
    
    private $grade;

    



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

    function __construct1($deliver_id)
    {
        $this->deliver_id = $deliver_id;

        include '../PHP/connexio.php';
        
        //definim la query com una variable
        $sql = "SELECT * FROM `deliveries` WHERE id_delivery = $this->deliver_id;";

        //enviem la query a la bbdd i guardem el contingut a la variable $result
        $result = $conn->query($sql);
        //fem un objecte que conte l'informacio que extreiem de de result amb "fetch_object()"
        $obj = $result->fetch_object();

        $this->activity_id = $obj->id_activity;
        $this->user_id = $obj->id_user; 
        $this->locate = $obj->locate;        
        $this->grade = $obj->grade;
    
        //tancar connexioDB
        $conn->close();
    }


    function __construct3($file, $activity_id, $user_id)
    {
        $this->deliver_file = $file;
        $this->activity_id = $activity_id;
        $this->user_id = $user_id;
    }


    function getFile(){
        include_once '../PHP/connexio.php';
        
        
        $file = $this->deliver_file;

        $filename = $file['name'];
        $file_type = $file['type'];
        $file_size = $file['size'];
        $hash = md5(uniqid(mt_rand()));
        $final_file_name = $hash.'_'.$filename;
        $route = "../content/activities";

        // Comprovamos que el archivo sea formato pdf o zip
        $allowed_types = array("application/pdf" , "application/zip");

        ///////////////////////////////////////////

        //Miramos si el directorio en el que queremos guardar el archivo existe, en caso de no
        //existir lo crearemos i le assignaremos permisos.
        if(!is_dir($route)){
        mkdir($route, 0777);
        }

        if(in_array($file_type, $allowed_types)){

            //Miramos si el archivo ocupa 1MB o menos (expresado en bytes)
            if($file_size <= 10000000){
                //Movemos el archivo al directorio que toca i guardamos la ruta de este en la variable "locate"
                move_uploaded_file($file['tmp_name'], $route . $final_file_name);
                $this->locate = $route . $final_file_name;

                
                //Finalmente si todo va bien le introducimos la informacion a la base de datos
                $sql = "INSERT INTO `deliveries` (id_activity,id_user,locate) VALUES ($this->activity_id,$this->user_id,'$this->locate');";

                $conn->query($sql);
                $conn->close();

            }

            else{
                echo "El archivo solo puede ser un ZIP o un PDF";
            }
        
        }
        else{
            echo "El archivo no puede ocupar mas de 1MB";
        }
    }
    
    public function apply_grade(){
        include "../PHP/connexio.php";
        $sql= "UPDATE `deliveries` SET `grade` = '$this->grade' WHERE `deliveries`.`id_delivery`= $this->deliver_id";
        return $conn->query($sql);        

    }







}
?>