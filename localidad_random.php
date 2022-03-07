<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <title>Localidad Random</title>
</head>
<body>


<?php 
        include 'conexion.php'; //Incluimos los datos de la conexión

        $conexion=mysqli_connect ($servidor, $usuario, $clave, $base_datos) or die ("No conecta con la base de datos");

        $cadena = "select count(n_provincia) from provincia";

        $consulta = "select nombre from provincias order by nombre";

        $resultado = mysqli_query($conexion, $consulta);

        $cadena = "select nombre from localidades where id_localidad = 2871";
        



        

        

?>

<h1>Adivina la provincia</h1>
<p>Localidad</p>
<form action="">
    <label for="provincia">Provincia</label>
    <?php

    while ($fila=mysqli_fetch_assoc ($resultado))
        echo "<option id='{$fila["nombre"]}' value='{$fila["nombre"]}'>{$fila ["nombre"]}</option>";

    ?>

</form>


</body>
</html>