<?php
class Articulo{

var $id, $nombre, $descripcion, $fkidseccion, $fkidsubseccion;

function __construct($id, $nombre, $descripcion, $fkidseccion, $fkidsubseccion){
    $this->id = $id;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->fkidseccion = $fkidseccion;
    $this->fkidsubseccion = $fkidsubseccion;
}

// Getter y Setter para la propiedad $id
function getId(){
    return $this->id;
}

function setId($id){
    $this->id = $id;
}

// Getter y Setter para la propiedad $nombre
function getNombre(){
    return $this->nombre;
}

function setNombre($nombre){
    $this->nombre = $nombre;
}

// Getter y Setter para la propiedad $descripcion
function getDescripcion(){
    return $this->descripcion;
}

function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
}

// Getter y Setter para la propiedad $fkidseccion
function getFkidseccion(){
    return $this->fkidseccion;
}

function setFkidseccion($fkidseccion){
    $this->fkidseccion = $fkidseccion;
}

// Getter y Setter para la propiedad $fkidsubseccion
function getFkidsubseccion(){
    return $this->fkidsubseccion;
}

function setFkidsubseccion($fkidsubseccion){
    $this->fkidsubseccion = $fkidsubseccion;
}

}


?>