<?php include("conexion.php");
$id=$_GET['id'];

$sql="SELECT nivel FROM usuarios WHERE id=$id";

$resultado=$con->query($sql);
$row=$resultado->fetch_assoc();

//$sql="UPDATE personas SET nombres='$nombres',apellidos='$apellidos',fecha_nacimiento='$fecha_nacimiento',sexo='$sexo',correo='$correo' WHERE id=$id";

if($row['nivel']== 0){
   $nuevo= 1;
   $stmt=$con->prepare('UPDATE usuarios SET nivel=? WHERE id=?');
   // Vincular parámetros
   $stmt->bind_param("ii",$nuevo,$id);
}else{
    $nuevo= 0;
   $stmt=$con->prepare('UPDATE usuarios SET nivel=? WHERE id=?');
   // Vincular parámetros
   $stmt->bind_param("ii",$nuevo,$id);
}


// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro Actualizado";
} else {
    echo "Error: " . $stmt->error;
}

$con->close();
?>
