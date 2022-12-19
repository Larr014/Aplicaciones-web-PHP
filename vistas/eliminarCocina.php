<?php
    session_start();
    require_once('../modelo/Db.php');
    $db = new Db();
    $datos = $db->obtenerCocina($_SESSION['idCocina']);
    var_dump($datos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once("menu/menu.php");
    ?>
    <form method="POST" action="../controlador/controladorAccionCocina.php">
        <input type="text" disabled name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $datos[0]['nombre']; ?>"><br/>
        <input type="text" disabled name="marca" id="marca" placeholder="Marca" value="<?php echo $datos[0]['marca']; ?>"><br/>
        <input type="number" disabled name="platillos" id="platillos" placeholder="Numero de platillos" value="<?php echo $datos[0]['nPlatos']; ?>"><br/>
        <button name="btnEliminar" value="<?php echo $datos[0]['idCocina']; ?>">Eliminar</button>
        
    </form>
</body>
</html>