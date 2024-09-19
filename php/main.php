<?php
#Concexión a la Base de Datos
function conexion(){
    $pdo = new PDO('mysql:host=localhost;dbname=pra', 'root', 'david123');
    return $pdo;
}
#Verificar datos
function verificar_datos($filtro,$cadena){
    if(preg_match("/^$/",$cadena)){

    }else{

    }
}