<?php

require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/estudiante.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiantes_controller.php';
use controllers\EstudianteController;


$estudianteController = new EstudianteController();

$id = empty($_GET['idE']) ? 0 : $_GET['idE'];
$tituloForm = empty($id) ? "Registrar" : "Modificar";
$actionForm = empty($id) ? "Registrar.php" : "actualizar.php";

$estudianteModel = empty($id) ? null : $estudianteController->detail($id);

$estudiante = [
    'codigo' => $estudianteModel == null ? '' : $estudianteModel->get('codigo'),
    'nombres' => $estudianteModel == null ? '' : $estudianteModel->get('nombres'),
    'apellidos' => $estudianteModel == null ? '' : $estudianteModel->get('apellidos'),
    'edad' => $estudianteModel == null ? 16 : $estudianteModel->get('edad'),
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
  
    <title>Formulario Estudiantes</title>
</head>
<body>
    <h1><?php echo $tituloForm; ?> Estudiante </h1>
    <br>
    <a href="index.php">Volver</a>
    <br><br>
    <form action="<?php echo $actionForm; ?>" method="POST">
    <?php
    if (!empty($id)){
        echo ' <input id="idInput" name="idInput" type="hidden" value="' . $id . '">';
    }
?>
<div>
    <label for="codigoInput">Codigo</label>
    <input id="codigoInput" name="codigoInput" type="text"
    value="<?php echo $estudiante['codigo'] ?>" require>
</div>
<label for="nombresInput">Codigo</label>
    <input id="nombresInput" name="nombresInput" type="text"
    value="<?php echo $estudiante['nombres'] ?>" require>
<div>

<label for="apellidosInput">Codigo</label>
    <input id="apelldiosInput" name="apellidosInput" type="text"
    value="<?php echo $estudiante['apelldios'] ?>" require>

</div>
<label for="edadInput">Codigo</label>
    <input id="edadInput" name="edadInput" type="text"
    value="<?php echo $estudiante['edad'] ?>" require>
<div>
 <button> type="submit">guardar</button>
</div>
</form>
    
</body>
</html>