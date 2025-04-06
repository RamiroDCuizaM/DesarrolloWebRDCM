<?php 
include("conexion.php");
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];

$fotografia = "";
if (isset($_FILES['fotografia']))
{
    $datosfotografia=explode('.', $_FILES['fotografia']['name']);
    $fotografia=uniqid().'.'.$datosfotografia[1];
    copy($_FILES['fotografia']['tmp_name'],"img/".$fotografia);

}


$stmt=$con->prepare('INSERT INTO productos(producto,precio,imagen) VALUES(?,?,?)');

// Vincular parámetros
$stmt->bind_param("sds",$nombres, $apellidos,$fotografia);



// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=mostrarP.php">
