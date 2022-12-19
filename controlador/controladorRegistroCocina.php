<?php
    //Me permite generar y ocupar la conexion
    require_once("../modelo/Db.php");
    require_once("../modelo/Cocina.php");
    if(isset($_POST['btnRegistrar'])){
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $platillos = $_POST['platillos'];
        //REGISTRAR EN LA BASE DE DATOS
        $db = new Db();
        $cocina = new Cocina($nombre,$marca,$platillos);
        $db->crearCocina($cocina);


    }
?>





