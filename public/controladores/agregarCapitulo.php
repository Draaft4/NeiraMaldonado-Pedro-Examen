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
            $numero= isset($_POST["numero"]) ? trim($_POST["numero"]) : null; 
            $titulo = isset($_POST["titulo"]) ? trim($_POST["titulo"]) : null; 
            $nombreAutor = isset($_POST["nombreAutor"]) ? trim($_POST["nombreAutor"]) : null; 
            $ISBN = $_GET['ISBN'];
            $sql = "SELECT lib_codigo FROM Libro WHERE lib_ISBN = $ISBN";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                $codLibro = $row['lib_codigo'];
               }
            }
            $sql2 = "SELECT aut_codigo FROM Autor WHERE aut_nombre = '$nombreAutor'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
               while($row2 = $result2->fetch_assoc()) {
                $codAutor = $row2['aut_codigo'];
               }
            }
            $sql3 = "INSERT INTO Capitulos VALUES (null, $numero,'$titulo',$codLibro,$codAutor)"; 
            //echo $sql3;
            if ($conn->query($sql3) === TRUE) { 
                echo "<p>Se ha creado los datos correctamemte!!!</p>"; 
                echo "<a href='../vista/agregarCapitulo.php?ISBN=$ISBN'>Crear mas Capitulos</a>"; 
                echo "<br>";
                echo "<a href='../vista/index.html'>Finalizar</a>"; 
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

    
