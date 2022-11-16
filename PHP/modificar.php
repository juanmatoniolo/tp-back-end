<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect('127.0.0.1', 'root', '');
mysqli_select_db($conexion, 'tp_final');

// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar

//Lo mismo el id este viene desde listar
$id = $_GET['id'];

// 3) Preparar la orden SQL
// => Selecciona todos los campos de la tabla alumno donde el campo dni sea igual a $dni
// a) generar la consulta a realizar
$consulta = "SELECT * FROM nav WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$respuesta = mysqli_query($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos = mysqli_fetch_array($respuesta);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar producto</title>
    </head>
    <body>
        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $tipo = $datos['tipo'];
        $nombre = $datos['nombre'];
        $producto = $datos['producto'];
        $descripcion = $datos['descripcion'];
        $foto = $datos['foto'];
        $precio = $datos['precio'];
        ?>

        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos.</p>
        
        <form action="" method="post" enctype="multipart/form-data">

            <label>Tipo </label>
            <input type="text" name="tipo" placeholder="tipo" value="<?php echo "$tipo"; ?>"> 

            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="nombre" value="<?php echo "$nombre"; ?>">

            <label>Producto</label>
            <input type="text" name="producto" placeholder="producto" value="<?php echo "$producto"; ?>">

            <label>Descripcion</label>
            <input type="text" name="descripcion" placeholder="descripcion" value="<?php echo "$descripcion"; ?>">

            <label>Imagen</label>
            <input type="file" name="foto" placeholder="foto">

            <label>Precio</label>
            <input type="text" name="precio" placeholder="precio" value="<?php echo "$precio"; ?>">


            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="index.html">Cancelar</button>


        </form>
        <?php // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if (array_key_exists('guardar_cambios', $_POST)) {
            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))

            $tipo = $_POST['tipo'];
            $nombre = $_POST['nombre'];
            $producto = $_POST['producto'];
            $descripcion = $_POST['descripcion'];
            $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
            $precio = $_POST['precio'];

            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
            $consulta = "UPDATE nav SET tipo='$tipo', nombre='$nombre', producto='$producto', descripcion='$descripcion', foto='$foto', precio='$precio' WHERE id =$id";

            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion, $consulta);

            // a) rederigir a index
            header('location: listar.php');
        } ?>
    </body>
</html>