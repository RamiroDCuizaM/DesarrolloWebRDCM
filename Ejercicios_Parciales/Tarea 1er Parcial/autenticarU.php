<?php session_start();
include("conexion.php");
$correo = $_POST['usuario'];
$password = sha1($_POST['contrasena']);
$stmt = $con->prepare('SELECT usuario,tipo FROM usuarios WHERE correo=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Usuario encontrado";
    $row = $result->fetch_assoc();
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['tipo'] = $row['tipo'];
    //header("Location:mostrarP.php");?>  
    <meta http-equiv="refresh" content="3;url=mostrarP.php">
<?php
} else {
    echo "Error datos de autenticación incorrectos";
    ?>
    <meta http-equiv="refresh" content="3;url=login.html">
    <?php
}

?>