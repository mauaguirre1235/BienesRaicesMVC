<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render(
            'paginas/index',
            [
                'propiedades' => $propiedades,
                'inicio' => $inicio
            ]
        );
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);

    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', ['propiedades' => $propiedades]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        // buscar la propiedad por su id 
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', ['propiedad' => $propiedad]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');

    }
    public static function contacto(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '2bf63ce3da43e6';
            $mail->Password = '1f509a6af41836';

            // Configurar el contenido el mail 
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // habilitar HTML 
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // definir el contenido 
            $contenido = '<html><p>Tienes un nuevo mensaje</p></html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';
            // enviar el mail

            if ($mail->send()) {
                echo "Mensaje enviado correctamente";
            } else {
                echo "El mensaje no se pudo enviar..";
            }

        }
        $router->render('paginas/contacto', [

        ]);
    }

}