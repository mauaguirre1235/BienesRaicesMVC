<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor; 
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class PropiedadController
{


    public static function index(Router $router)
    {

        $propiedades = Propiedad::all();
        // Muestra mensjae condicional 
$resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', ['propiedades' => $propiedades
        , 'resultado' => $resultado]);


    } 

    public static function crear(Router $router)  
    {
        $propiedad = new Propiedad; 
        $vendedores = Vendedor::all();  
        // Arreglo con mensajes de errores 
        $errores = Propiedad::getErrores();


       // Ejecuta el codigo despues de que el usuario envia el formulario 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  $propiedad = new Propiedad($_POST['propiedad']);



  // Generar un nombre unico 
  $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


  if ($_FILES['propiedad']['tmp_name']['imagen']) { 
    $manager = new Image(Driver::class);
    $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
    $propiedad->setImagen($nombreImagen);
  } 

  $errores =  $propiedad->validar();


  // REVISAR QUE EL ARRAY DE ERRORES EST VACIO
  if (empty($errores)) {


    /** SUBIDA DE ARCHIVOS**/

    
    if (!is_dir(CARPETA_IMAGENES)) {
      mkdir(CARPETA_IMAGENES);
    }


    // GUARDAR LA IMAGEN EN EL SERVIDOR
    $image->save(CARPETA_IMAGENES . $nombreImagen);

     $propiedad->guardar();

   
  }
}


      $router->render('propiedades/crear', [
        'propiedad' => $propiedad,
         'vendedores' => $vendedores,
        'errores' => $errores   
        ]); 
    }


    
    public static function actualizar()
    {
        echo "actualizar propiedad";
    }
}
