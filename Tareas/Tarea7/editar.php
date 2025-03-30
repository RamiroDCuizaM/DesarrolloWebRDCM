<?php  
include("conexion.php");
$correo=$_POST['correo'];
$id=$_POST['id'];

//$sql="UPDATE personas SET nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',correo='$correo' WHERE id=$id";


$stmt=$con->prepare('UPDATE usuarios SET correo=? WHERE id=?');


// Vincular parámetros
$stmt->bind_param("si",$correo, $id);



// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
<meta http-equiv="refresh" content="3;url=pregunta4.php">