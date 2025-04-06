<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body style="background-color: #0554BD;">
    <div style="margin: 0 auto; background-color:white; width: 350px; height: 400px;">
        <img src="img/Avatar.png" alt="" style="width: 70px; height: 70px; margin-top: 50px; margin-left:130px">
        <h3 style="text-align: center;">Inicia Sesion con tu cuenta</h3>
        <form action="autenticarU.php" method="post">
            <label for="usuario" style="margin-left: 40px; color: #D5E1ED;">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" style="margin-left: 40px; border: 1px solid white; border-bottom: 2px solid #D5E1ED;"><br><br>           
            <label for="contrasena" style="margin-left: 40px; color: #D5E1ED;">Contrasena</label><br>
            <input type="text" name="contrasena" id="contrasena" style="margin-left: 40px; border: 1px solid white; border-bottom: 2px solid #D5E1ED;"><br><br>
            <input type="submit" value="LOG IN" style="text-align: center; width: 300px; height: 50px; margin:20px 0 0 25px ;">
        </form>
    </div>
</body>
</html>