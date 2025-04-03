<?php
include 'conexion.php';
    for ($i = 1; $i <= $_POST['n']; $i++) {
        $nombres = $_POST["nombres$i"];
        $apellidos = $_POST["apellidos$i"];
        $cu = $_POST["cu$i"];
        $sexo = $_POST["sexo$i"];
        $codigocarrera = $_POST["codigocarrera$i"];

        $fotografia = "";
        if ($_FILES["fotografia$i"]["name"]!="")
        {
            $datosfotografia=explode('.', $_FILES["fotografia$i"]['name']);
            $fotografia=uniqid().'.'.$datosfotografia[1];
            copy($_FILES["fotografia$i"]['tmp_name'],"images/".$fotografia);
        
        }

        
        $sql = "INSERT INTO alumnos (fotografia, nombres, apellidos, cu, sexo, codigocarrera) 
                VALUES ('$fotografia', '$nombres', '$apellidos', '$cu', '$sexo', '$codigocarrera')";
                $resultado = $con->query($sql);
}
               
if($resultado){?>
<h1>Datos insertados correctamente</h1>
<meta http-equiv="refresh" content="3; url=mostrar_Alumnos.php">
<?php
}else{
    echo "Error al insertar los datos";
}
?>