<?php
$dias = array("Lunes","Martes","Miercoles","Jueves");
echo "Los dias de la semana son:";
foreach($dias as $dia){
   echo $dia."<br>";
}

echo "Los meses del anio son:";
foreach($dias as $indice=>$mes){
   echo $mes."<br>";
}

$datos = [1,"hola",3.14.true];
echo "los datos son:";
foreach($datos as $clave=>$valor){
    echo $valor.="<br>";
}

$persona = ["nombre"=>"Juan",];
echo "los datos son:";
foreach($datos as $clave=>$valor){
    echo $valor.="<br>";
}
?>
