<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title></title> 
        <style type="text/css" rel="stylesheet"> 
        .error{ 
        color: red; 
        } 
        </style> 
    </head> 
    <body> 
        <?php 
            //incluir conexión a la base de datos 
            include '../../config/conexionBD.php'; 
            $nombre= isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null; 
            $ISBN = isset($_POST["ISBN"]) ? trim($_POST["ISBN"]) : null; 
            $numPag = isset($_POST["numPag"]) ? trim($_POST["numPag"]) : null; 
            $sql = "INSERT INTO Libro VALUES (null, '$nombre',$ISBN,$numPag)"; 
            echo $sql;
            if ($conn->query($sql) === TRUE) { 
                echo "<p>Se ha creado los datos correctamemte!!!</p>"; 
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
    </body> 
</html>

    
