<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <title>Elección de Provincia</title>
</head>
<body>


<?php 
        include 'conexion.php'; //Incluimos los datos de la conexión

        $conexion=mysqli_connect ($servidor, $usuario, $clave, $base_datos) or die ("No conecta con la base de datos");

        $consulta = "select l.nombre from localidades l, 
                    provincias p where l.n_provincia=p.n_provincia and p.nombre='{$_GET['provincias']}' 
                    order by nombre;";

        $resultado = mysqli_query($conexion, $consulta);

        $num_filas = mysqli_num_rows($resultado);

        if($num_filas > 0){?>
            <form>
            <label for="localidades">Elija la localidad deseada</label>
            <select name="localidades" id="localidades">
                <?php
                    while ($fila= mysqli_fetch_assoc ($resultado))
                            echo "<option value = '{$fila["nombre"]}'> {$fila["nombre"]} </option>";
                ?>
            </select>
            <button onclick=>Buscar localidades</button>
    </form>    
    <?php
        } else {
            echo "No hay datos en las tablas";
        }

        function habitantes(){
            $consultaHabitantes = "select nombre, poblacion
                                from localidades;";

            echo "El nombre y la población seleccinados son:" . $consultaHabitantes;
        }

    ?>

</body>
</html>