<?php
require_once('credenciales.php');
require_once('Cocina.php');
class Db{
    private $conexion;
    
    function open(){
        global $serverName,$databaseName,$userName,$password;
        try{
            $conexion = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion exitosa";
        }catch(PDOException $e){
            echo "Conexion Fallida";
        }
        
    }
    function close(){
        $conexion = null;
    }
    //Vamos a recibir un objeto de tipo cocina
    function crearCocina($cocina){
        this->open();
        try{
            $stmt = $conexion->prepare("INSERT INTO Cocina (nombre, marca, nPlatos)
            VALUES (:nombre, :marca, :nPlatos)");
            $stmt->bindParam(':nombre', $cocina->getNombre());
            $stmt->bindParam(':marca', $cocina->getMarca());
            $stmt->bindParam(':nPlatos', $cocina->getNPlatos());
            $stmt->execute();
    
        }catch(PDOException $e){
            echo "Fallo al registrar";
        }
        this->close();

    }  
    

}
?>