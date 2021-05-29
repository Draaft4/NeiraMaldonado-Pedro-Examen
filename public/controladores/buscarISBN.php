<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title></title> 
        <style type="text/css" rel="stylesheet"> 
        .error{ 
        color: red; 
        } 
        </style> 
        <link rel="stylesheet" href="../styles/stylesBox.css">
    </head> 
    <body> 
    <div class="login">
    <div class="login-form">
        <?php 
            //incluir conexión a la base de datos 
            include '../../config/conexionBD.php'; 
            $nombre= isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null; 
            $sql = "SELECT lib_ISBN FROM Libro WHERE lib_nombre='$nombre'"; 
            //echo $sql;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                    $ISBN = $row['lib_ISBN'];
               }
            }
            //echo $ISBN;
            if ($ISBN!=null) { 
                echo "<p>Libro encontrado!!!</p>"; 
                echo "<a href='../vista/agregarCapitulo.php?ISBN=$ISBN'>Crear Capitulos</a>"; 
            } else { 
                if($conn->errno == 1062){ 
                    echo "<p class='error'>Error! </p>"; 
                }else{ 
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
                } 
            } 
                //cerrar la base de datos 
            $conn->close(); 
            
        ?> 
        </div>
    </div>
    </body> 
</html>

    
