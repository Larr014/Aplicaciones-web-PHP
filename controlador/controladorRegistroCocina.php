<?php
    //Me permite generar y ocupar la conexion
    require_once("../modelo/Db.php");
    if(isset($_POST['btnRegistrar'])){
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $platillos = $_POST['platillos'];
        //REGISTRAR EN LA BASE DE DATOS
        $db = new Db();
        $db->open();
    }
?>