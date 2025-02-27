<?php
$alumno1["nombre" => "Juan", "apellido" => "Perez","edad" => "21"];
$alumno2["nombre"=>"Juan", "apellido"=>"Perez","edad"=>"21"];
$alumno3["nombre"=>"Juan", "apellido"=>"Perez","edad"=>"21"];
$lista_alumnos = [$alumno1,$alumno2,$alumno3];
echo "<table border="1">";
echo "<tr><th>Nombre</th><th>Apellido</th><th>Edad</th></tr>";
foreach( $lista_alumnos as $alumno){
    echo "<tr>";
    echo "<td>".$alumno["nombre"]."</td>";
    echo "<td>".$alumno["apellido"]."</td>";
    echo "<td>".$alumno["edad"]."</td>";
    echo "</tr>";
}
echo "</table>";
?>