<?php
 //incluir conexión a la base de datos
 include "../../config/conexionBD.php";
 $autor = $_GET['autor'];
 //echo "Hola " . $autor;

 $sql = "SELECT * FROM Libro l, Autor a, Capitulos c WHERE c.cod_libro=l.lib_codigo and c.cod_autor=a.aut_codigo and a.aut_nombre ='$autor'";
 //echo $sql;
$verf = 0;
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['cap_numero'] == 1 ){
            $verf = 0;
        }
        if($verf==0){
            echo "<p><b>Nombre del autor:</b> ".$row['aut_nombre']."</p>";
            echo "<p><b>Nacionalidad del autor:</b> ".$row['aut_nacionalidad']."</p>";
            echo "<p><b>Titulo del Libro:</b> ".$row['lib_nombre']."</p>";
            echo "<p><b>Codigo ISBN:</b> ".$row['lib_ISBN']."</p>";
            echo "<p><b>Numero de paginas:</b> ".$row['lib_num_pag']."</p>";
            echo " <table style='width:100%' border='1' align='center'>
            <tr>
            <th>Numero Capitulo</th>
            <th>Titulo del Capitulo</th>
            </tr>";
        }
        echo "<tr>";
        echo " <td>" . $row['cap_numero'] . "</td>";
        echo " <td>". $row['cap_titulo'] ."</td>";
        echo "</tr>";
        $verf=$verf+1;
    }
}else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    echo "</table>";

 $conn->close();
?>