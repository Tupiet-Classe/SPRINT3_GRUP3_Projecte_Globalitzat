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
    public function __construct3($nombreCurso, $descripcionCurso, $imagenCurso)
    {
        $this->nombreCurso = $nombreCurso;
        $this->descripcionCurso = $descripcionCurso;
        $this->imagenCurso = $imagenCurso;
    }

    public function update($new_name, $new_description) {
        include '../PHP/connexio.php';

        $id_course = $this->idCurso;

        $updateQuery = $conn->prepare('UPDATE courses SET name_course = ?, description_course = ? WHERE id_course = ?');
        $updateQuery->bind_param('ssi', $new_name, $new_description, $id_course);
        return $updateQuery->execute();
    }

    public function delete() {
        include '../PHP/connexio.php';

        $id_course = $this->idCurso;

        $updateQuery = $conn->prepare('DELETE FROM courses WHERE id_course = ?');
        $updateQuery->bind_param('i', $id_course);
        return $updateQuery->execute();
    }

    /**
     * addCurso - Futuro método para añadir cursos
     *
     * @return void
     */
    public function addCurso() {
        $name_course = $this->nombreCurso;
        $description_course = $this->descripcionCurso;
        $image = $this->imagenCurso;

        // Recuperem el nom, tipus i mida de la imatge
        $image_name = $image['name'];
        $image_type = $image['type'];
        $image_size = $image['size'];

        // Ruta on guardarem les imatges
        $route = '../images/imagenes-curso/'; 

        // Generem un hash aleatori
        $hash = bin2hex(random_bytes(32));

        // Guardem el nom de l'arxiu amb el hash
        $final_file_name = $hash.'_'.$image_name;

        // Definim el tipus d'arxiu que acceptem (només imatges JPG/JPEG i PNG)
        $allowed_types = array("image/jpg" , "image/jpeg" , "image/png");

        // Si el directori on anem a guardar les dades no existeix, crea'l
        if(!is_dir($route)){
            mkdir($route, 0755);
        }

        // Si l'arxiu té el format correcte i pesa menys d'1MB, penjarem l'arxiu al servidor
        if (in_array($image_type, $allowed_types) && $image_size <= 1000000) {
            move_uploaded_file($image['tmp_name'], $route . $final_file_name);
        }

        $sql="INSERT INTO courses(name_course, description_course, image) VALUES('$name_course','$description_course', '$final_file_name')";
        
        return db_query($sql);
    }
    
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
        include '../PHP/connexio.php';

        $userId;
        $courseId = $this->idCurso;

        if (preg_match("/^\w+@\w+\.\w+$/", $user)) {
            $emailQuery = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
            $emailQuery->bind_param('s', $user);

            $userId = $this->get_id_from_query($emailQuery);
        } else {
            $usernameQuery = $conn->prepare("SELECT id_user FROM users WHERE nick_name = ?");
            $usernameQuery->bind_param('s', $user);

            $userId = $this->get_id_from_query($usernameQuery);
        }

        $existsQuery = $conn->prepare('SELECT id_user_course FROM user_course WHERE id_user = ? AND id_course = ?');
        $existsQuery->bind_param('ii', $userId, $courseId);
        $existsQuery->execute();

        if ($existsQuery->get_result()->num_rows == 0) {
            $insert = $conn->prepare("INSERT INTO user_course (id_user, id_course) VALUES (?, ?)");
            $insert->bind_param('ii', $userId, $courseId);
    
            $success;
            
            try {
                $success = $insert->execute();
            } catch (\Throwable $th) {
                $success = false;
            }
    
            $conn->close();

        } else {
            $success = false;
        }

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
            $conn->close();
            return true;
        } 

        $conn->close();

        return false;
    }

    public function send_feedback($rating, $feedback) {
        include_once '../PHP/connexio.php';

        $course_id = $this->idCurso;

        $insertQuery = $conn->prepare('INSERT INTO ratings (rating, Feedback, id_course) VALUES (?, ?, ?)');
        $insertQuery->bind_param('isi', $rating, $feedback, $course_id);
        return $insertQuery->execute();
    }

    public function is_course_finished($id_user) {
        include '../PHP/connexio.php';

        $course_id = $this->idCurso;
        $numberOfActivitiesQuery = $conn->prepare(
            'SELECT COUNT(*) as count_value
            FROM activities
            INNER JOIN categories ON activities.id_category = categories.id_category
            WHERE categories.id_course = ?'
        );
        $numberOfActivitiesQuery->bind_param('i', $course_id);
        $numberOfActivitiesQuery->execute();
        $numberOfActivitiesQueryResult = $numberOfActivitiesQuery->get_result();
        $activities_count = $numberOfActivitiesQueryResult->fetch_all(MYSQLI_ASSOC)[0]['count_value'];

        $numberOfActivitiesQuery->close();
        
        $numberOfActivitiesDoneQuery = $conn->prepare(
            'SELECT COUNT(*) as count_value
            FROM deliveries 
            INNER JOIN activities ON deliveries.id_activity = activities.id_activity
            INNER JOIN categories ON activities.id_category = categories.id_category
            WHERE deliveries.grade IS NOT NULL AND categories.id_course = ?'
        );
        $numberOfActivitiesDoneQuery->bind_param('i',$course_id);
        $numberOfActivitiesDoneQuery->execute();
        $numberOfActivitiesDoneQueryResult = $numberOfActivitiesDoneQuery->get_result();

        $activities_done_count = $numberOfActivitiesDoneQueryResult->fetch_all(MYSQLI_ASSOC)[0]['count_value'];

        return $activities_count == $activities_done_count;
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
        include '../PHP/connexio.php';
        $courseId = $this->idCurso;
        $selectQuery = $conn->prepare('SELECT name_course FROM courses WHERE id_course = ?');
        $selectQuery->bind_param('i', $courseId);
        $selectQuery->execute();

        // Guardem el resultat
        $result = $selectQuery->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0]['name_course'];
    }

    public function get_description() {
        include '../PHP/connexio.php';
        $courseId = $this->idCurso;
        $selectQuery = $conn->prepare('SELECT description_course FROM courses WHERE id_course = ?');
        $selectQuery->bind_param('i', $courseId);
        $selectQuery->execute();

        // Guardem el resultat
        $result = $selectQuery->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0]['description_course'];
    }

    public function get_users_from_course() {
        include_once '../PHP/connexio.php';

        $selectQuery = $conn->prepare('SELECT users.id_user, users.nick_name, users.name_user, users.last_name FROM users INNER JOIN user_course ON users.id_user = user_course.id_user WHERE user_course.id_course = ?');
        $selectQuery->bind_param('i', $this->idCurso);

        $selectQuery->execute();

        $result = $selectQuery->get_result();
        if ($result->num_rows > 0) {
            return array('count' => $this->get_number_of_users(), 'data' => $result->fetch_all(MYSQLI_ASSOC));
        } else return array('count' => 0, 'data' => false);

        $conn->close();
    } 

    public function get_users_from_course_with_limit($offset, $number_of_values) {
        include '../PHP/connexio.php';

        $selectQuery = $conn->prepare('SELECT users.id_user, users.nick_name, users.name_user, users.last_name FROM users INNER JOIN user_course ON users.id_user = user_course.id_user WHERE user_course.id_course = ? ORDER BY users.id_user LIMIT ?, ?');
        $selectQuery->bind_param('iii', $this->idCurso, $offset, $number_of_values);

        $selectQuery->execute();

        $result = $selectQuery->get_result();
        if ($result->num_rows > 0) {
            return array('count' => $this->get_number_of_users(), 'data' => $result->fetch_all(MYSQLI_ASSOC));
        } else return array('count' => 0, 'data' => []);

        $conn->close();
    } 

    public function search_users_from_course_with_limit($search, $offset, $number_of_values) {
        include '../PHP/connexio.php';

        $search = '%' . $search . '%';

        $selectQuery = $conn->prepare(
            'SELECT users.id_user, users.nick_name, users.name_user, users.last_name 
            FROM users 
            INNER JOIN user_course ON users.id_user = user_course.id_user 
            WHERE user_course.id_course = ? 
            AND (users.nick_name LIKE ? OR users.name_user LIKE ? OR users.last_name LIKE ?)
            ORDER BY users.id_user 
            LIMIT ?, ?'
        );
        $selectQuery->bind_param('isssii', $this->idCurso, $search, $search, $search, $offset, $number_of_values);

        $selectQuery->execute();

        $result = $selectQuery->get_result();
        if ($result->num_rows > 0) {
            return array('count' => $this->get_number_of_users_with_search($search) ,'data' => $result->fetch_all(MYSQLI_ASSOC));
        } else return array('count' => 0, 'data' => []);

        $conn->close();
    } 

    public function get_number_of_users() {
        include '../PHP/connexio.php';

        $selectQuery = $conn->prepare('SELECT COUNT(*) as count_total FROM users INNER JOIN user_course ON users.id_user = user_course.id_user WHERE user_course.id_course = ?');

        $selectQuery->bind_param('i', $this->idCurso);
        $selectQuery->execute();

        $result = $selectQuery->get_result();
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0]['count_total'];
        } else return 0;

    }

    public function get_number_of_users_with_search($search) {
        include '../PHP/connexio.php';

        $search = '%' . $search . '%';

        $selectQuery = $conn->prepare(
            'SELECT COUNT(*) as count_total
            FROM users 
            INNER JOIN user_course ON users.id_user = user_course.id_user 
            WHERE user_course.id_course = ? 
            AND (users.nick_name LIKE ? OR users.name_user LIKE ? OR users.last_name LIKE ?)
            ORDER BY users.id_user '
        );
        $selectQuery->bind_param('isss', $this->idCurso, $search, $search, $search);

        $selectQuery->execute();

        $result = $selectQuery->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0]['count_total'];
        } else return 0;

        $conn->close();
    } 

    public function get_feedback() {
        include '../PHP/connexio.php';
        $feedbackQuery = $conn->prepare('SELECT rating, Feedback FROM ratings WHERE id_course = ?');
        $feedbackQuery->bind_param('i', $this->idCurso);
        $feedbackQuery->execute();

        $result = $feedbackQuery->get_result();
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return false;
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
        INNER JOIN categories
        ON deliveries.id_activity = activities.id_activity
        AND activities.id_category = categories.id_category
        WHERE id_user LIKE $id_user AND categories.id_course = $this->idCurso"; 
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
