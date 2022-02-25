<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <title>Elección de Comunidad Autónoma</title>
</head>
<body>

    <?php 
        include 'conexion.php'; //Incluimos los datos de la conexión

        $conexion=mysqli_connect ($servidor, $usuario, $clave, $base_datos) or die ("No conecta con la base de datos");

        $consulta= "select nombre from comunidades order by nombre;";
        $resultado=mysqli_query ($conexion, $consulta);
        $num_filas=mysqli_num_rows ($resultado);

        if ($num_filas>0) {
            
    ?>

    <form action="provincias.php">
        <label for="comunidad">Elija la comunidad deseada</label>
        <select name="comunidad" id="comunidad">
            <?php

                while ($fila=mysqli_fetch_assoc ($resultado))
                    echo "<option value='{$fila["nombre"]}'>{$fila ["nombre"]}</option>";

            ?>
        </select>
        <button>Buscar provincias</button>
            
        
    </form>

    <?php
        }
        else
            echo "No hay datos en la tabla";

    ?>

</body>
</html>