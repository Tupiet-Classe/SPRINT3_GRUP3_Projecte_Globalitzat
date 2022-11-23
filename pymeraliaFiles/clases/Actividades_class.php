<?php
class Actividades{
    private $idActividad;
    private $notaActividad;

    /**
     * @param mixed $idActividad
     * @param mixed $notaActividad
     * @return void
     */

     public function __construct($idActividad, $notaActividad){
        $this->idActividad = $idActividad;
        $this->notaActividad = $notaActividad;
     }

    /**
     * getIdActividad
     * 
     * @return void
     */
    public function getIdActividad(){
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
    public function setIdActividad(){
        $this->idActividad = $idActividad;
    }
    /**
     * setNotaActividad
     * 
     * @param mixed $notaActividad
     * @return void
     */
    public function setNotaActividad(){
        $this->notaActividad = $notaActividad;
    }
    /**
     * anadirActividad - Método que se utilizara para añadir una nueva actividad
     * 
     * @return void
     */
    public function añadirActividad(){

    }
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