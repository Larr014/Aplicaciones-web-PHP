<?php
    require_once('../modelo/Db.php');
    $db = new Db();
    $resultado = $db->mostrarCocinas();
    
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
   <table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Platillos</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php
        foreach ($resultado as $fila) {
            echo "<tr>";
            echo "<td>".$fila['idCocina']."</td>";
            echo "<td>".$fila['nombre']."</td>";
            echo "<td>".$fila['marca']."</td>";
            echo "<td>".$fila['nPlatos']."</td>";
            echo "<td><a href='../controlador/controladorAccionCocina.php?a=1&id=".$fila["idCocina"]."' >Editar</a></td>";
            echo "<td><a href='../controlador/controladorAccionCocina.php?a=2&id=".$fila["idCocina"]."' >Eliminar</a></td>";
            echo "</tr>";
        }
    ?>
   </table> 
</body>
</html>