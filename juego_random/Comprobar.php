<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar resultado</title>
</head>
<body>
    <?php
    session_start();

        include 'conexion.php'; //Incluimos los datos de la conexión

        $conexion = mysqli_connect($servername, $username, $password, $database) or die ("Conexión con base de datos fallida.");
        $consulta = "select p.nombre name from localidades l, provincias p where l.nombre='{$_SESSION["localidadRandom"]}' && l.n_provincia = p.n_provincia;";
        $resultado = mysqli_query($conexion, $consulta) or die ("Consulta a la base de datos fallida.");

        if (mysqli_num_rows($resultado) > 0) { //Si la tabla tiene datos...
    ?>
            <?php
                while ($fila = mysqli_fetch_assoc ($resultado)){
                    $provinciaReal = "{$fila["name"]}";
                }                    
            if ($provinciaReal == $_GET['provincia']) {
                echo "<h3> Has acertado! {$_SESSION["localidadRandom"]} está en $provinciaReal </h3>";
                $_SESSION["aciertos"]+=1;
                $_SESSION["intentos"]+=1;
            } else {
                echo "<h3> Has fallado... {$_SESSION["localidadRandom"]} NO está en $provinciaReal </h3>";
                $_SESSION["intentos"]+=1;
            }
            $aciertos=intval($_SESSION["aciertos"]);
            $intentos=intval($_SESSION["intentos"]);
            $porcentaje=$aciertos/$intentos*100;
            echo "Aciertos = $aciertos, Intentos = $intentos, Porcentaje = $porcentaje%";

        } else {
            echo "No hay datos actualmente en la base de datos.";
        }    
    ?>

    <a href="comunidades.php"> Volver a jugar </a>
</body>
</html>