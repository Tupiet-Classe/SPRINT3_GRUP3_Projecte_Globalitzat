<?php
include_once "../PHP/databaseFunctions.php";

class Curs
{
    private $idCurso;
    private $nombreCurso;
    private $descripcionCurso;
    private $imagenCurso;

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
    public function __construct1($idCurso)
    {
        $this->idCurso = $idCurso;
    }
    public function __construct2($nombreCurso, $descripcionCurso)
    {
        $this->nombreCurso = $nombreCurso;
        $this->descripcionCurso = $descripcionCurso;
    }


    /**
     * getIdCurso
     *
     * @return void
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }
    
    /**
     * getNombreCurso
     *
     * @return void
     */
    public function getNombreCurso()
    {
        return $this->nombreCurso;
    }

    /**
     * getDescripcionCurso
     *
     * @return void
     */
    public function getDescripcionCurso()
    {
        return $this->descripcionCurso;
    }

    /**
     * getImagenCurso
     *
     * @return void
     */
    public function getImagenCurso()
    {
        return $this->imagenCurso;
    }

    /**
     * setIdCurso
     *
     * @param  mixed $idCurso
     * @return void
     */
    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
    }

    /**
     * setNombreCurso
     *
     * @param  mixed $nombreCurso
     * @return void
     */
    public function setNombreCurso($nombreCurso)
    {
        $this->nombreCurso = $nombreCurso;
    }

    /**
     * setDescripcionCurso
     *
     * @param  mixed $descripcionCurso
     * @return void
     */
    public function setDescripcionCurso($descripcionCurso)
    {
        $this->descripcionCurso = $descripcionCurso;
    }

    /**
     * setImagenCurso
     *
     * @param  mixed $imagenCurso
     * @return void
     */
    public function setImagenCurso($imagenCurso)
    {
        $this->imagenCurso = $imagenCurso;
    }

    /**
     * addCurso - Futuro método para añadir cursos
     *
     * @return void
     */
    public function addCurso()
    {
        $sql="INSERT INTO courses(name_course, description_course) VALUES('$this->nombreCurso','$this->descripcionCurso')";
        
            return db_query($sql);
    }
    /**
     * editCurso - Futuro método para editar cursos
     *
     * @return void
     */
    public function editCurso()
    {
    }
    /**
     * deleteCurso - Futuro método para eliminar cursos
     *
     * @return void
     */
    public function deleteCurso()
    {
    }
    /**
     * showCursos - Futuro método para mostrar cursos
     *
     * @return void
     */
    public function showCursos()
    {
        $sql = "SELECT name_course from courses where id_course = $this->idCurso"; 
        $db=db_query($sql);
        return $db;
    }

    public function showAllRecursosURL(){

        
        $sql = "SELECT resources_url.`id_resource_url` as id, resources_url.`name_resource_url` as name, resources_url.`location` as location_or_description, resources_url.`id_category`, resources_url.`hidden`, 'url' as type 
        FROM `resources_url` INNER JOIN categories ON categories.id_category = resources_url.id_category 
        where categories.id_course = $this->idCurso
        
        UNION

        SELECT resources_files.id_resource_file, resources_files.name_resource_file, resources_files.location, resources_files.id_category, resources_files.hidden, 'file' as type 
        FROM resources_files INNER JOIN categories ON categories.id_category = resources_files.id_category
        where categories.id_course = $this->idCurso

        UNION
        
        SELECT resources_text.`id_resource_text`, resources_text.`name_resource_text`, resources_text.`description_resource_text`, resources_text.`id_category`, resources_text.`hidden`, 'text' as type 
        FROM `resources_text` INNER JOIN categories ON categories.id_category = resources_text.id_category
        where categories.id_course = $this->idCurso"; 

        $db=db_query($sql);
        return $db;
    }

    public function get_all_categories() {
        include '../PHP/connexio.php';

        $id_course = $this->idCurso;

        $categoriesQuery = $conn->prepare('SELECT id_category, name_category, hidden FROM categories WHERE id_course = ?  and hidden is null');
        $categoriesQuery->bind_param('i', $id_course);
        $categoriesQuery->execute();

        return $categoriesQuery->get_result();
    }
    
    /**
     * assignCurso - Método para asignar cursos
     *
     * @return void
     */
    public function assignCurso($user)
    {
        include_once '../PHP/connexio.php';

        $userId;

        if (preg_match("/^\w+@\w+\.\w+$/", $user)) {
            $emailQuery = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
            $emailQuery->bind_param('s', $user);

            $userId = $this->get_id_from_query($emailQuery);
        } else {
            $usernameQuery = $conn->prepare("SELECT id_user FROM users WHERE nick_name = ?");
            $usernameQuery->bind_param('s', $user);

            $userId = $this->get_id_from_query($usernameQuery);
        }

        $insert = $conn->prepare("INSERT INTO user_course (id_user, id_course) VALUES (?, ?)");
        $insert->bind_param('ii', $userId, $this->idCurso);

        $success;
        
        try {
            $success = $insert->execute();
        } catch (\Throwable $th) {
            $success = false;
        }

        $conn->close();

        return $success;


    }
    /**
     * unassignCurso - Método para desasignar cursos
     *
     * @return void
     */
    public function unassignCurso($user) {
        include_once '../PHP/connexio.php';
        $id_course = $this->idCurso;
        // Primer, revisarem si aquest usuari està assignat a aquest curs o no
        $existsQuery = $conn->prepare('SELECT id_user_course FROM user_course WHERE id_course = ? AND id_user = ?');
        $existsQuery->bind_param('ii', $this->idCurso, $user);
        $existsQuery->execute();

        $resultExists = $existsQuery->get_result();
        if ($resultExists->num_rows > 0) {
            // L'usuari està assignat
            $idToDelete = $resultExists->fetch_all(MYSQLI_ASSOC)[0]['id_user_course'];
            $unassignQuery = $conn->prepare('DELETE FROM user_course WHERE id_user_course = ?');
            $unassignQuery->bind_param('i', $idToDelete);
            $unassignQuery->execute();
        } 

        $conn->close();
    }

    public static function get_all_courses() {
        include_once '../PHP/connexio.php';
        // Recuperem tots els cursos
        $selectQuery = $conn->prepare('SELECT id_course, name_course, description_course, image, hidden FROM courses');
        $selectQuery->execute();

        // Retornem tots els cursos
        return $selectQuery->get_result();
    }

    public static function get_all_non_hidden_courses() {
        include_once '../PHP/connexio.php';
        // Recuperem tots els cursos
        $selectQuery = $conn->prepare('SELECT id_course, name_course, description_course, image FROM courses WHERE hidden is null');
        $selectQuery->execute();

        // Guardem el resultat
        $result = $selectQuery->get_result();

        return $result->num_rows>0 ? $result : false;
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

    public function get_average($id_user){
        include "../PHP/connexio.php";

        $sql = "SELECT avg(grade) as avg 
        FROM deliveries 
        INNER JOIN activities
        ON deliveries.id_activity = activities.id_activity
        WHERE id_user LIKE $id_user AND activities.id_course = $this->idCurso"; 
        $result = $conn->query($sql);
        
        $first_row = $result->fetch_assoc();
        
        return $first_row['avg'];
    }
    
    public static function subscription_course_user($id_user){
        include "../PHP/connexio.php";
        $sql = "SELECT courses.name_course as 'name', courses.id_course as 'id'
        FROM courses INNER JOIN user_course 
        ON courses.id_course=user_course.id_course
        INNER JOIN users ON user_course.id_user=users.id_user WHERE users.id_user = $id_user"; 

        return $conn->query($sql);        
    }
    public function check_activities(){
        include "../PHP/connexio.php";
        $sql2 = "SELECT name_activity as 'Activitat', description_activity as 'Descripció', grade as 'Nota' FROM `activities` INNER JOIN deliveries ON activities.id_activity = deliveries.id_activity WHERE id_course = $this->idCurso AND deliveries.id_user=1";
        return $conn->query($sql2);        
    }
    public function apply_grades(){
        include "../PHP/connexio.php";
        $sql = "INSERT INTO `deliveries` (`id_delivery`, `locate`, `grade`, `id_activity`, `id_user`) VALUES ('9', 'Exemple entrega 1, si', '8', '1', '1')";
        return $conn->query($sql2);        
    }
}
