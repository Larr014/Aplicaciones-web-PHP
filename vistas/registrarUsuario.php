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
    <form method="POST" action="controladorRegistroCocina">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br/>
        <input type="text" name="marca" id="marca" placeholder="Marca"><br/>
        <input type="number" name="platillos" id="platillos" placeholder="Numero de platillos"><br/>
        <input type="submit" value="Registrar" name="btnRegistrar">
    </form>
</body>
</html>