<?php
    if(isset($_GET['a'])){
        switch ($_GET['a']) {
            case 1:
                session_start();
                $_SESSION['idCocina'] = $_GET['id'];

                header('Location: ../vistas/actualizarCocina.php');
              
                break;
            case 2:
                header('Location: ../vistas/eliminarCocina.php');
              
                    break;
                
            default:
                # code...
                break;
        }
    }
    if(isset($_POST['btnActualizar'])){
        require_once("../modelo/Db.php");
        require_once("../modelo/Cocina.php");
        $id = $_POST['btnActualizar'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $platillos = $_POST['platillos'];
        $db = new Db();
        $cocina = new Cocina($nombre,$marca,$platillos);
        $cocina->setId($id);
        $db->actualizarCocina($cocina);
        header('Location: ../vistas/mostrarCocinas.php');
              

    }elseif(isset($_POST['btnEliminar'])){
        require_once("../modelo/Db.php");
        $id = $_POST['btnEliminar'];
        $db = new Db();
        $db->eliminarCocina($id);
        header('Location: ../vistas/mostrarCocinas.php');
              

    }

?>