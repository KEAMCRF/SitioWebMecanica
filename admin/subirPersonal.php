<?php
require_once("DB.php");
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
                if($nombreprofesor!=""){
                    $targetfolder = "CV/";
                    $targetfolder = $targetfolder . basename( $_FILES['archivo']['name']) ;
                   if(move_uploaded_file($_FILES['archivo']['tmp_name'], $targetfolder))
                    {
                        //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
                    }
                    else {
                        //echo "Problem uploading file";
                    }
                    $archivo = $targetfolder;
                    $conexion = new DB();
                    $resultado = $conexion->insertarProfesor($nombreprofesor, $puesto, $carrera, $archivo);
                    session_start();
                    $_SESSION['result'] = 'guardado';
                    if($resultado>0){
                        header('Location: prueba_admin.php');
                    }
                    else{
                        header('Location: prueba_admin.php');
                        $_SESSION['result'] = 'error';
                    }
            }   
}
else{
    
    echo "se genero un error";
}
?>