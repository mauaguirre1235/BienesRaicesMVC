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

    $mensaje = null; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $respuestas = $_POST['contacto'];

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
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre:  ' . $respuestas['nombre'] . '</p>';

            // Enviar de forma condicional algunos campos de email o de telefono
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por telefono:</p>';
                $contenido .= '<p>Telefono:  ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha Contacto:  ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora:  ' . $respuestas['hora'] . '</p>';


            } else {
                // Es email, entonces agregamos el campo de email
                $contenido .= '<p>Eligio ser contactado por email:</p>';
                $contenido .= '<p>Email:  ' . $respuestas['email'] . '</p>';

            }

            $contenido .= '<p>Mensaje:  ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o Presupuesto:  $' . $respuestas['precio'] . '</p>';
            $contenido .= '<p>Prefieres ser contactado por:  ' . $respuestas['contacto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';
            // enviar el mail

            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar..";
            }

        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

}