<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylesBox.css">
</head>
<body>
    <div class="login">
        <div class="login-form">
            <form id="formulario01" method="POST" action="../controladores/buscarISBN.php">
                <h3 for="nombre">Nombre (*)</h3>
                <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el titulo del libro" />
                <br>
                <br>
                <input type="submit" id="crear" name="crear" value="Aceptar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='index.html'" />
            </form>
        </div>
    </div>
</body>
</html>