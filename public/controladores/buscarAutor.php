<?php
 //incluir conexión a la base de datos
 include "../../config/conexionBD.php";
 $autor = $_GET['autor'];
 //echo "Hola " . $autor;

 $sql = "SELECT * FROM Libro l, Autor a, Capitulos c WHERE c.cod_libro=l.lib_codigo and c.cod_autor=a.aut_codigo and a.aut_nombre ='$autor'";
 //echo $sql;

//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            echo "<p><b>Nombre del autor:</b> ".$row['aut_nombre']."</p>";
            echo "<p><b>Nacionalidad del autor:</b> ".$row['aut_nacionalidad']."</p>";   
            break;
    }
}else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    echo "</table>";

 $conn->close();
?>