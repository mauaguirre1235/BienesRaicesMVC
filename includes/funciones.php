<?php


define('TEMPLATES_URL', __DIR__ . '/templates'); // guarda la ruta completa hacia la carpeta templates
define('FUNCIONES_URL', __DIR__ . 'funciones.php'); // guarda el nombre del archivo donde estan las funciones comunes 
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/'); // guarda la ruta completa hacia la carpeta de imagenes




function incluirTemplates($nombre, $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}


function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
        exit();
    }

}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}


// Escapar / Sanitizar el HTML  

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;

}

// validad tipo de contenido 
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}


// Muestra los mensajes 
function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamete';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamete';
            break;

        default:
            $mensaje = 'False';
            break;
    }
    return $mensaje;
}


function validarORedireccionar(string $url)
{

    // Validar la URL por ID valido 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
        
    }
 
    return $id;  


}
