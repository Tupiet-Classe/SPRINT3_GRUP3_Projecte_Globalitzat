<?php
include_once "../PHP/databaseFunctions.php";

class Categoria
{
    private $idCategoria;
    private $nombreCategoria;

    /**
     * __construct - Constructor de clase
     *
     * @param  mixed $idCurso
     * @param  mixed $nombreCurso
     * @param  mixed $descripcionCurso
     * @param  mixed $imagenCurso
     * @return void
     */
    public function __construct(){
  
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();
    
        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
      }
    public function __construct1($idCategoria)
    {
        $this->$idCategoria = $idCategoria;
    }

    public function get_all_recursos(){
        include '../PHP/connexio.php';
        $id_category = $this->idCategoria;

        $recursosQuery = $conn->prepare(
        "SELECT `id_resource_url` as id, `name_resource_url` as name, `location` as location_or_description, `id_category`, `hidden`, 'url' as type 
        FROM `resources_url` 
        where id_category = ?
        
        UNION

        SELECT id_resource_file, name_resource_file, location, id_category, hidden, 'file' as type 
        FROM resources_files 
        where id_category = ?

        UNION
        
        SELECT `id_resource_text`, `name_resource_text`, `description_resource_text`, `id_category`, `hidden`, 'text' as type 
        FROM `resources_text`
        where id_category = ?");

        $recursosQuery->bind_param('iii', $id_category, $id_category, $id_category);
        $recursosQuery->execute();

        return $recursosQuery->get_result();
    }
    
    

    public function get_title() {
        include_once '../PHP/connexio.php';
        $courseId = $this->idCurso;
        $selectQuery = $conn->prepare('SELECT name_course FROM courses WHERE id_course = ?');
        $selectQuery->bind_param('i', $courseId);
        $selectQuery->execute();

        // Guardem el resultat
        $result = $selectQuery->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0]['name_course'];
    }

    public function get_users_from_course() {
        include_once '../PHP/connexio.php';

        $selectQuery = $conn->prepare('SELECT users.id_user, users.nick_name, users.name_user, users.last_name FROM users INNER JOIN user_course ON users.id_user = user_course.id_user WHERE user_course.id_course = ?');
        $selectQuery->bind_param('i', $this->idCurso);

        $selectQuery->execute();

        $result = $selectQuery->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else return false;

        $conn->close();
    } 

    public function get_id_from_query($query) {
        $query->execute();
        
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0]['id_user'];
        }
    }
}
