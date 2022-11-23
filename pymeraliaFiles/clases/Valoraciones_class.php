<?php
class Valoraciones{
    private $idValoracion;
    private $valoracionCurso;
    private $feedbackCurso;

    /** Constructor de la clase Recursos */    
    /**
     * __construct
     *
     * @param  mixed $idValoracion
     * @param  mixed $valoracionCurso
     * @param  mixed $feedbackCurso
     * @return void
     */
    public function __construct($idValoracion, $valoracionCurso, $feedbackCurso){
        $this->idValoracion = $idValoracion;
        $this->valoracionCurso = $valoracionCurso;
        $this->feedbackCurso = $feedbackCurso;
    }

    /** getter Id Valoracion */    
    /**
     * getIdValoracion
     *
     * @return void
     */
    public function getIdValoracion(){
        return $this->idValoracion;
    }

    /** getter Valoracion Curso */    
    /**
     * getValoracionCurso
     *
     * @return void
     */
    public function getValoracionCurso(){
        return $this->valoracionCurso;
    }

    /** getter Feedback Curso */    
    /**
     * getFeedbackCurso
     *
     * @return void
     */
    public function getFeedbackCurso(){
        return $this->feedbackCurso;
    }

    /** setter Id Valoracion */    
    /**
     * setIdValoracion
     *
     * @param  mixed $idValoracion
     * @return void
     */
    public function setIdValoracion($idValoracion){
        $this->idValoracion = $idValoracion;
    }

    /** setter Valoracion Curso */    
    /**
     * setValoracionCurso
     *
     * @param  mixed $valoracionCurso
     * @return void
     */
    public function setValoracionCurso($valoracionCurso){
        $this->valoracionCurso = $valoracionCurso;
    }

    /** setter Feedback Curso */    
    /**
     * setFeedbackCurso
     *
     * @param  mixed $feedbackCurso
     * @return void
     */
    public function setFeedbackCurso($feedbackCurso){
        $this->$feedbackCurso = $feedbackCurso;
    }

    /** Método que añade una valoracion nueva */    
    /**
     * addValoracion
     *
     * @return void
     */
    public function addValoracion(){

    }

    /** Método que edita una valoracion existente */    
    /**
     * editValoracion
     *
     * @return void
     */
    public function editValoracion(){

    }

    /** Método que elimina una valoracion existente*/    
    /**
     * deleteValoracion
     *
     * @return void
     */
    public function deleteValoracion(){

    }

    /** Método que muestra una valoracion existente */    
    /**
     * showValoracion
     *
     * @return void
     */
    public function showValoracion(){

    }

    /** Método que asigna una valoracion */    
    /**
     * assignValoracion
     *
     * @return void
     */
    public function assignValoracion(){

    }

    /** Método que desasigna una valoracion */    
    /**
     * unassignValoracion
     *
     * @return void
     */
    public function unassignValoracion(){

    }
}
?>