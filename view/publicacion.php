<?php
if (isset($_GET['id'])) {
    $datos = array("idPublicacion" => $_GET['id']);

    $row = $publicacion->list_Publicacion($datos);
} else {
    header("location: index");
}
?>

<?php

echo "<h1>" . $row['tituloPublicacion'] . "</h1>
    <img src='assets/images/user/" . $row['archivoPublicacion'] . "' style='width: 100%;'>
";

?>

<form action=""></form>