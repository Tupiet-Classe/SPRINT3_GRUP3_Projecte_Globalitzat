<?php
    $conexion = mysqli_connect("localhost", "pymeralia", "pymeralia1", "pymeralia");

if($_FILES["archivo"]) {
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $ruta = "archivos/" . $nombre_base;
    $subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
    if($subirarchivo){ 
        $insertarSQL = "INSERT INTO resources_files(archivo) VALUES ('$ruta')";
        $resultado = mysqli_query($conexion, $insertarSQL);
        if($resultado){
            echo "<script>alert('Se han subido los archivos'); window.location='recurs.php'</script>";
        }   else{
            printf("Errormessage: %s\n", mysqli_error($conexion));
        }

    }
} else {
    echo "Error al subir archivo";
}