<?php
include ('conexion.php');
$n = $_GET['n'];
$sql = "SELECT codigo, carrera FROM carreras";
$result = mysqli_query($con, $sql);
$carreras = [];
while ($row = mysqli_fetch_assoc($result)) {
    $carreras[] = $row;
}
?>
<link rel="stylesheet" href="style.css">
<form class="tablaI" action="insert_alumnos.php" method="post" enctype="multipart/form-data">
    <table style="border-collapse: collapse; border: 1px solid #4F81BC;">
        <tr>
            <th></th>
            <th>Fotografía</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>

        <?php for ($i = 1; $i <= $n; $i++) { ?>
            <tr>
                <td><b><?php echo $i; ?></b></td>
                <td class="tdI"><input type="file" name="fotografia<?= $i ?>" id="fotografia<?= $i ?>"></td>
                <td class="tdI"><input type="text" name="nombres<?= $i ?>" ></td>
                <td class="tdI"><input type="text" name="apellidos<?= $i ?>"></td>
                <td class="tdI"><input type="text" name="cu<?= $i ?>" ></td>
                <td class="tdI">
                    <input type="radio" name="sexo<?= $i ?>" value="M" >Masculino
                    <input type="radio" name="sexo<?= $i ?>" value="F" >Femenino
                </td>
                <td class="tdI">
                    <select name="codigocarrera<?= $i ?>" style="text-align: start;">
                       <?php foreach ($carreras as $carrera) { ?>
                            <option value="<?= $carrera['codigo']; ?>"><?= $carrera['carrera']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <input type="hidden" name="n" value="<?php echo $n; ?>">
    <input type="submit" value="Insertar" class="bttnI">
    <input type="reset" value="Borrar" class="bttnB">
</form>
