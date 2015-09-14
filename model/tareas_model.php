<?php

class TareasModel {

  private $tareas;

  function __construct() {
      $this->tareas = array('Tarea 1','Tarea 2','Tarea 3');
  }

  function getTareas(){
    return $this->tareas;
  }

  function agregarTarea($tarea){
    array_push($this->tareas, $tarea);
  }

  function borrarTarea($tarea){
    foreach ($this->tareas as $key => $value) {
      if($value == $tarea)
      {
        unset($this->tareas[$key]);
      }
    }
  }

}
?>
