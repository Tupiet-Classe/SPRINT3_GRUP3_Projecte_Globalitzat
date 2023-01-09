<?php
include_once "../PHP/databaseFunctions.php";

class Categoria
{
    private $idCategoria;
    private $nombreCategoria;
    private $idCurso;

    /**
     * __construct - Constructor de clase
     *
     * @param  mixed $idCategoria
     * @param  mixed $nombreCategoría
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
        $this->idCategoria = $idCategoria;
    }

    public function __construct2($nombreCategoria, $idCurso)
    {
        $this->nombreCategoria = $nombreCategoria;
        $this->idCurso = $idCurso;
    }

    public function create() {
        include '../PHP/connexio.php';

        $name = $this->nombreCategoria;
        $course_id = $this->idCurso;

        $insertQuery = $conn->prepare('INSERT INTO categories (name_category, id_course) VALUES (?, ?)');
        $insertQuery->bind_param('si', $name, $course_id);
        return $insertQuery->execute();
    }

    public function update($new_name) {
        include '../PHP/connexio.php';

        $id_category = $this->idCategoria;

        $updateQuery = $conn->prepare('UPDATE categories SET name_category = ? WHERE id_category = ?');
        $updateQuery->bind_param('si', $new_name, $id_category);
        return $updateQuery->execute();
    }

    public function delete() {
        include '../PHP/connexio.php';

        $category_id = $this->idCategoria;
        $today = date("Y-m-d");  

        $updateQuery = $conn->prepare('UPDATE categories SET hidden = ? WHERE id_category = ?');
        $updateQuery->bind_param('si', $today, $category_id);
        return $updateQuery->execute();
    }

    public function get_all_recursos(){
        include '../PHP/connexio.php';
        $id_category = $this->idCategoria;
        
        $recursosQuery = $conn->prepare(
        "SELECT `id_resource_url` as id, `name_resource_url` as name, `location` as location_or_description, `id_category`, `hidden`, 'url' as type 
        FROM `resources_url` 
        where id_category = ? and hidden is null
        
        UNION

        SELECT id_resource_file, name_resource_file, location, id_category, hidden, 'file' as type 
        FROM resources_files 
        where id_category = ? and hidden is null

        UNION
        
        SELECT `id_resource_text`, `name_resource_text`, `description_resource_text`, `id_category`, `hidden`, 'text' as type 
        FROM `resources_text`
        where id_category = ? and hidden is null
        
        UNION

        SELECT `id_activity`, `name_activity`, `description_activity`, `id_category`, `hidden`, 'activity' as type 
        FROM `activities`
        where id_category = ? and hidden is null
        
        ");

        $recursosQuery->bind_param('iiii', $id_category, $id_category, $id_category, $id_category);
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
