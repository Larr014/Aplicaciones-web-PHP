<?php
require_once('credenciales.php');
require_once('Cocina.php');
class Db{
    private $conexion;
    
    function open(){
        global $serverName,$databaseName,$userName,$password;
        try{
            $this->conexion = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion exitosa";
        }catch(PDOException $e){
            echo "Conexion Fallida";
        }
        
    }
    function close(){
        $this->conexion = null;
    }
    //Vamos a recibir un objeto de tipo cocina
    function crearCocina($cocina){
        $nombre = $cocina->getNombre();
        $marca = $cocina->getMarca();
        $nPlatos = $cocina->getNPlatos();
        
        $this->open();
        try{
            $sql = "INSERT INTO Cocina (nombre, marca, nPlatos)
            VALUES (:nombre, :marca, :nPlatos)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':nPlatos', $nPlatos);
            $stmt->execute();
    
        }catch(PDOException $e){
            echo "Fallo al registrar";
            echo $e->getMessage();
        }
        $this->close();

    }  
    
    function mostrarCocinas(){
        try{
            $this->open();
            $sql = "SELECT * FROM Cocina";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            //Indica como vas a recuperar de la BD
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();  
            return $result;    
        }catch(PDOException $e){

        }
    }
    function obtenerCocina($id){
        try{
            $this->open();
            $sql = "SELECT * FROM Cocina WHERE idCocina=:idCocina";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':idCocina', $id);
            $stmt->execute();
            //Indica como vas a recuperar de la BD
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();  
            return $result;    
        }catch(PDOException $e){

        }
    }
    function actualizarCocina($cocina){
        $id = $cocina->getId();
        $nombre = $cocina->getNombre();
        $marca = $cocina->getMarca();
        $nPlatos = $cocina->getNPlatos();
        
        $this->open();
        try{
            $sql = "UPDATE Cocina SET nombre=:nombre, marca=:marca, nPlatos=:nPlatos WHERE idCocina=:idCocina";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':nPlatos', $nPlatos);
            $stmt->bindParam(':idCocina', $id);
            
            $stmt->execute();
    
        }catch(PDOException $e){
            echo "Fallo al registrar";
            echo $e->getMessage();
        }
        $this->close();

    }  
    function eliminarCocina($id){
        
        $this->open();
        try{
            $sql = "DELETE FROM Cocina WHERE idCocina=:idCocina";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':idCocina', $id);
            
            $stmt->execute();
    
        }catch(PDOException $e){
            echo "Fallo al registrar";
            echo $e->getMessage();
        }
        $this->close();

    }
    function login($usuario,$clave){
        try{
            $this->open();
            $sql = "SELECT * FROM Usuario WHERE usuario=:usuario AND pass=:pass";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $clave);
            $stmt->execute();
            //Indica como vas a recuperar de la BD
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();  
            return $result;    
        }catch(PDOException $e){
            return null;
        }        
    }
}
?>







