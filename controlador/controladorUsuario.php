<?php
    if(isset($_POST['iUsuario'])){
        $usuario = $_POST['iUsuario'];
        $password = $_POST['iPassword'];
        if($usuario == 'admin'){
            if($papssword =='admin'){
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
            default:
                header('Location: ../vistas/error403.php');
                break;
        }
    }
    else{
        header('Location: ../vistas/error403.php');
    }  
    

?>