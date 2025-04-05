<?php session_start();
include("conexion.php");
$correo = $_POST['usuario'];
$password = sha1($_POST['contrasena']);
$stmt = $con->prepare('SELECT usuario,nombrecompleto,nivel FROM usuarios WHERE usuario=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Usuario encontrado";
    $_SESSION['correo'] = $correo;
    $_SESSION['nivel'] = $result->fetch_assoc()['nivel'];
    header("Location:inicio.php");

} else {
    echo "Error datos de autenticación incorrectos";
    ?>
    <meta http-equiv="refresh" content="3;url=login.html">
    <?php
}

?>