<?php 
class Qualificacions {
  private $idQualificacions;
  private $notaQualificacions;
  private $descripcionQualificacions;

  
  /**
   * __construct
   *
   * @param  mixed $idQualificacions
   * @param  mixed $notaQualificacions
   * @param  mixed $descripcionQualificacions
   * @return void
   */
  public function __construct($idQualificacions, $notaQualificacions, $descripcionQualificacions){
    $this->idQualificacions = $idQualificacions;
    $this->notaQualificacions = $notaQualificacions;
    $this->descripcionQualificacions = $descripcionQualificacions;
  }
  
  /**
   * getIdQualificacions
   *
   * @return void
   */
  public function getIdQualificacions(){
    return $this->idQualificacions;
  }
  
  /**
   * getnotaQualificacions
   *
   * @return void
   */
  public function getNotaQualificacions(){
    return $this->notaQualificacions;
  }
  
  /**
   * getDescripcionQualificacions
   *
   * @return void
   */
  public function getDescripcionQualificacions(){
    return $this->descripcionQualificacions;
  }
  


  
  /**
   * setIdQualificacions
   *
   * @param  mixed $idQualificacions
   * @return void
   */
  public function setIdQualificacions($idQualificacions){
    $this->idQualificacions = $idQualificacions;
  }
  
  /**
   * setnotaQualificacions
   *
   * @param  mixed $notaQualificacions
   * @return void
   */
  public function setNotaQualificacions($notaQualificacions){
    $this->notaQualificacions = $notaQualificacions;
  }
  
  /**
   * setDescripcionQualificacions
   *
   * @param  mixed $descripcionQualificacions
   * @return void
   */
  public function setDescripcionQualificacions($descripcionQualificacions){
    $this->descripcionQualificacions = $descripcionQualificacions;
  }


  
  /**
   * addQualificacions
   *
   * @return void
   */
  public function addQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions){
  include_once "../PHP/connexio.php";
  $conn = conn();
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    //Transformar de 0 o 1 a sí

    $sql =  "INSERT INTO `users` (`id_user`, `dni`, `name_user`, `last_name`, `phone_number`, `email`, `emblems`, `nick_name`, `password`, `hidden`, `id_company`, `type_user`) VALUES ('$id', '$dni', '$email', '$nom', '$cognom', '$telefon',  '$email', NULL, '$usuari', '$pass', 0, '$idEmpresa', '$typeUsr')";
      
    if (mysqli_query($conn, $sql)) {
        header("Location: ../llistatUsuaris/index.php");

    } else {
        echo "<a id='error'>Error updating record: " . mysqli_error($conn); 
    }
    mysqli_close($conn);
    }   

  
  /**
   * editQualificacions
   *
   * @return void
   */
  public function editQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions){
    include_once "../PHP/connexio.php";

}
  
  /**
   * deleteQualificacions
   *
   * @return void
   */
  public function deleteQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions){
  include_once "../PHP/connexio.php";

}
  
  /**
   * showQualificacions
   *
   * @return void
   */
  public function showQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions){
  include_once "../PHP/connexio.php";

}
  /**
   * MijanaQualificacions
   *
   * @return void
   */
  public function MitjanaQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions){
    include_once "../PHP/connexio.php";
    $sql = "SELECT avg(qualification) as avg FROM grade WHERE id_user LIKE 1"; 
    $result = $conn->query($sql);
    
    $first_row = $result->fetch_assoc();
    
    echo $first_row['avg'];
    
  }

}
$qualificacio = new Qualificacions();
$qualificacio->addQualificacions($idQualificacions, $notaQualificacions, $descripcionQualificacions);
?>

  
