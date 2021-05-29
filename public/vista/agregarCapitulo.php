<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Capitulo</title>
    <link rel="stylesheet" href="../styles/stylesBox.css">
    <script src="../../config/buscarAutor.js"></script>
</head>
<body>
<div class="login">
    <div class="login-header">
        <h1>Agregar Capitulo</h1>
    </div>
    <div class="login-form">
    <?php
    $ISBN = $_GET['ISBN'];
    echo 'Libro con codigo ISBN: '.$ISBN;
    echo '<form id="formulario01" method="POST" action="../controladores/agregarCapitulo.php?ISBN='.$ISBN.'">';
    ?>
    <h3 for="numero">Numero del Capitulo (*)</h3>
    <input type="text" id="numero" name="numero" value="" placeholder="Ingrese el numero del Capitulo" />
    <br>
    <h3 for="titulo">Titulo del Capitulo (*)</h3>
    <input type="text" id="titulo" name="titulo" value="" placeholder="Ingrese el titulo del capitulo" />
    <br>
    <?php
        include "../../config/conexionBD.php";
        $sql = "SELECT aut_nombre FROM Autor";
        //echo $sql;
        echo '<select name="nombreAutor" id="nombreAutor">';
       //cambiar la consulta para puede buscar por ocurrencias de letras
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {              
               echo '<option value="'.$row['aut_nombre'].'">'.$row['aut_nombre'].'</option>';
           }
        }
        echo'</select>';
    ?>
    <input type="button" value="Buscar" onclick="buscarAutores()">
    <div id="informacion"></div>
    <br>
    <br>
    <input type="submit" id="crear" name="crear" value="Aceptar" />
    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='index.html'" />
    </form>
    </div>
</div>
</body>
</html>