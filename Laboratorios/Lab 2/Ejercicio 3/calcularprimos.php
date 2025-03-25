<?php
include 'primo.php';
$np = $_GET['np'];
if ($np > 0) {
    $primoObj = new Primo();
    $primos = $primoObj->generarPrimos($np);
} else {
    $primos = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos</title>
    <style>
        .container {
            width: 70%;
            margin: auto;
            text-align: center;
        }
        .lista-primos {
            border: 2px solid green;
            background-color: yellow;
            padding: 25px;
            display: inline-block;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Lista de Números Primos</h1>
    <?php if (!empty($primos)){ ?>
        <ol class="lista-primos">
            <?php foreach ($primos as $primo){ ?>
                <li><?php echo $primo; ?></li>
            <?php } ?>
        </ol>
    <?php }else{ ?>
        <p>Por favor, ingrese un número válido.</p>
    <?php } ?>
</div>

</body>
</html>
