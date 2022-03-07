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
        $consulta = "select nombre from provincias order by nombre;";
        $resultado = mysqli_query($conexion, $consulta) or die ("Consulta a la base de datos fallida.");
        $consulta2 = "select nombre from localidades order by rand () limit 1;";
        $resultado2 = mysqli_query($conexion, $consulta2) or die ("Consulta a la base de datos fallida.");

        if (mysqli_num_rows($resultado) > 0) { //Si la tabla tiene datos...
    ?>
            <h3>Adivina la provincia</h3>
            <form action=comprobar.php> 
                <label>Localidad:</label>
                <?php
                        while ($fila = mysqli_fetch_assoc ($resultado2)){
                            $localidadRandom = $fila["nombre"];
                            echo "<b>{$fila["nombre"]}</b>";
                        }
                        $_SESSION["localidadRandom"]=$localidadRandom;                    
                ?>
                <br> <br>
                <select name=provincia>
                    <?php
                        while ($fila = mysqli_fetch_assoc ($resultado)){
                            echo "<option value='{$fila["nombre"]}'>{$fila["nombre"]}</option>";
                        }                    
                    ?>
                </select>
                <br> <br>
                <button>Comprobar</button>
                <br> <br>
            </form>
    <?php
            $porcentaje=$aciertos/$intentos*100;
            echo "Aciertos = $aciertos, Intentos = $intentos, Porcentaje = $porcentaje%";
        } else {
            echo "No hay datos actualmente en la base de datos.";
        }    
    ?>

</form>


</body>
</html>