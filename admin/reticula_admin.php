<?php 
    session_start();
    if($_SESSION['result'] == 'guardado'){
        echo '<script>alert("Guardado exitosamente!");</script>';
    }
    if($_SESSION['result'] == 'editado'){
        echo '<script>alert("Editado exitosamente!");</script>';
    }
    if($_SESSION['result'] == 'eliminado'){
        echo '<script>alert("Eliminado exitosamente!");</script>';
    }
    if($_SESSION['result'] == 'error'){
        echo '<script>alert("Error, vuelva a intentarlo");</script>';
    }
    $_SESSION['result']= "";
?>
<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->
<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mec�nica</title>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>

       <!-- Materialized libraries -->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="icon" href="img/icon.png"/>
        <!--Import jQuery before materialize.js-->
        <!-- Compiled and minified JavaScript -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="/SitioWebMecanica/js/admin.js"/></script>
        <script type="text/javascript" src="/SitioWebMecanica/js/agregarPersonal.js"/></script>
        <style type="text/css">
            body{
                background: #dddddd;
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
           }
        </style>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       </head>


<body>
  <!--encabezado y menus-->
  <nav>
    <div class="nav-wrapper grey darken-1">
      <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only left"><i class="material-icons">menu</i></a>
      <a href="#" class="brand-logo center"><h5>Metal Mecánica</h5></a>
    </div>
  </nav>

  <nav class="hide-on-med-and-down">
        <div class="nav-wrapper grey darken-1 center-align">
            <ul class="center hide-on-med-and-down">
                <li><a href="prueba_admin.php"><i class="material-icons">Personal</i></a></li>
                <li><a href="reticula_admin.php"><i class="material-icons">Reticula</i></a></li>
                <li><a href="indices_admin.php"><i class="material-icons">Índices</i></a></li>
            </ul>
        </div>
    </nav>
     <!-- SECCION PARA AGREGAR LAS MATERIAS -->
     <div class="Cprincipal_index card-panel grey lighten-4">
            <h1>Agregar Materia</h1>
            <form action="subirMateria.php" method="post" enctype="multipart/form-data" id="agregarMateriaForm">
                <input type="text" name= "nombremateria" id="nombremateria" placeholder="Nombre de la materia">
                <input type="number"  min="0" max="11" default="1" name= "creditosmateria" id="creditosmateria" placeholder="Creditos de la materia">
                <input type="text" name= "tipomateria" id="tipomateria" placeholder="Tipo de la materia">
                <input type="number"  min="1" max="12" default="1" name= "semestremateria" id="semestremateria" placeholder="Semestre de la materia">
                <div class="input-field col s12">
                    <select id="carrera" name="carrera">
                        <option value="mecanica">Mec&aacutencia</option>
                        <option value="mecatronica">Mecatr&oacutenica</option>
                    </select>
                    <label>Carrera</label>
                </div>
                <input type="text" name= "abreviacionmateria" id="abreviacionmateria" placeholder="Abreviación de la materia">
                <label for="archivo">Seleccione un archivo para subir</label>  
                <br>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Programa</span>
                        <input type="file"  accept="application/pdf" name="archivo" id="archivo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                    <i class="material-icons right">save</i>
                </button>
            </form>
        </div>

    <!-- SECCION PARA EDITAR LAS MATERIAS -->
    <div class="Cprincipal_index card-panel grey lighten-4">
        <h1>Editar Materias</h1>
        <form action="editarMateria.php" method="post" enctype="multipart/form-data" id="editarMateriaForm">
            <div class="input-field col s12">
                <select id="nombremateriaeditar" class="nombremateriaeditar" name="nombremateriaeditar">
                    <?php
                        require_once("DB.php");
                        $db = new DB();
                        $SQL = "SELECT materia FROM materias";
                        $resultado = $db->ejecutar($SQL);
                        foreach($resultado as $fila){
                            $json= json_decode($fila[0]);
                    ?>
                    <option value="<?=$fila[0]?>">
                        <?=$fila[0]?>
                    </option>  
                    <?php
                        }
                    ?>
                </select>
                <label>Materias</label>
            </div>
                <input type="number"  min="0" max="11" name= "creditosmateriaeditar" id="creditosmateriaeditar" placeholder="Creditos de la materia">
                <input type="text" name= "tipomateriaeditar" id="tipomateriaeditar" placeholder="Tipo de la materia">
                <input type="number"  min="1" max="12" name= "semestremateriaeditar" id="semestremateriaeditar" placeholder="Semestre de la materia">
                <div class="input-field col s12">
                    <select id="carreraeditar" name="carreraeditar">
                        <option value="mecanica">Mec&aacutencia</option>
                        <option value="mecatronica">Mecatr&oacutenica</option>
                    </select>
                    <label>Carrera</label>
                </div>
                <input type="text" name= "abreviacionmateriaeditar" id="abreviacionmateriaeditar" placeholder="Abreviación de la materia">
                <label for="archivo">Seleccione un archivo para subir</label>  
                <br>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Programa</span>
                        <input type="file"  accept="application/pdf" name="archivoeditar" id="archivoeditar">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                    <i class="material-icons right">system_update_alt</i>
                </button>
            </form>
        </div>

    <!-- SECCION PARA ELIMINAR LAS MATERIAS -->
    <div class="Cprincipal_index card-panel grey lighten-4">
        <h1>Eliminar Materias</h1>
        <form action="eliminarMateria.php" method="post" enctype="multipart/form-data" id="eliminarMateriaForm">
            <div class="input-field col s12">
                <select id="eliminarmateria" name="eliminarmateria">
                    <option value="x" disabled selected>Elija una materia</option>
                    <?php
                    //Conexion a la base de datos
                    require_once("DB.php");
                    $db = new DB();
                    $SQL = "SELECT materia FROM materias";
                    $resultado = $db->ejecutar($SQL);
                    foreach($resultado as $fila){
                        $json= json_decode($fila[0]);
                    ?>
                    <option value="<?=$fila[0]?>">
                    <?=$fila[0]?>
                    </option>  
                    <?php
                    }
                    ?>
                </select>
                <label>Eliminar</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Eliminar
                <i class="material-icons right">delete_forever</i>
            </button>
            </form>
    </div>
    </body>
</html> 