<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Cliente</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 10px;
            padding: 20px; 
            background-color: #F0F0F0;
        }
        .box {
            border: 1px solid #ccc;
            padding: 15px;
            font-weight: bold;
        }
        .bg1 { background-color: #d9f3f7; }
        .bg2 { background-color: #e8f5e9; }
        .bg3 { background-color: #fff9c4; }
        .bg4 { background-color: #fde0dc; }
        .bg5 { background-color: #e1bee7; }
        .bg6 { background-color: #bbdefb; }
    </style>
</head>
<body>
    <h2>Datos del Cliente</h2>
    <div class="grid">
        <div class="box bg1">Nombres: <?php echo " ".$_POST['nombres']; ?> </div>
        <div class="box bg2">Apellidos: <?php echo " ". $_POST['apellidos'] ?></div>
        <div class="box bg3">Sexo: <?php echo " ". $_POST['sexo'] ?></div>
        <div class="box bg4">Dirección: <?php echo " ".$_POST['direccion'] ?></div>
        <div class="box bg5">Celular: <?php echo " ".$_POST['celular'] ?> </div>
        <div class="box bg6">Correo: <?php echo " ".$_POST['correo'] ?></div>
    </div>
    <meta http-equiv="refresh" content="3;url=inicio.php">
</body>
</html>
