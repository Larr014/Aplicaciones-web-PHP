<?php
    if(isset($_POST['iUsuario'])){
        $usuario = $_POST['iUsuario'];
        $password = $_POST['iPassword'];
        if($usuario=='admin'){
            if($password=="admin"){
                session_start();
                $_SESSION['tipoUsuario'] = "admin";
                
                header('Location: ../vistas/principal.php');
    
            }
           
        }else{
           #llamar a la base de datos y recuperar el usuario
           require_once("../modelo/Db.php");
            $db = new Db();
            $respuesta = $db->login();
            if($repuesta!=null){
                session_start();
                $_SESSION['tipoUsuario'] = "usuario";
        
                header('Location: ../vistas/principal.php');
    
            }
        }
        
        if($usuario == 'admin'){
            if($password =='admin'){
                //entrar al sistema
                header('Location: ../vistas/principal.php');
    
            }else{
                header('Location: ../vistas/login.php');
    
            }
        }else{
            header('Location: ../vistas/registroUsuario.php');

        }
    }
    elseif(isset($_GET['o'])){
        $op = $_GET['o'];
        switch ($op) {
            case '1':
                header('Location: ../vistas/registrarCocina.php');
                break;
            case '2':
                header('Location: ../vistas/mostrarCocinas.php');
                break;
            case '-1':
                    session_start();
                    session_destroy();
                    header('Location: ../vistas/login.php');
                    break;
                
            default:
                header('Location: ../vistas/error403.php');
                break;
        }
    }
    else{
        header('Location: ../vistas/error403.php');
    }  
    

?>