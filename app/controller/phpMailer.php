<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
    header("Location: login.html");
    exit();
}

require_once '../model/phpMailer.php';

$emailSender = new EmailSender(
    'smtp.gmail.com',
    'kevinteran750@gmail.com',
    'cdci zcqv hmys psxh', // Asegúrate de que este sea tu contraseña de aplicación de Gmail
    465,
    'ssl'
);

if (isset($_GET['op'])) {
    $op = $_GET['op'];

    switch ($op) {
        case 'enviarCorreo':
            try {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                // Configurar remitente
                $emailSender->setFrom('kevinteran750@gmail.com', 'KevStoreOnline');

                // Configurar destinatario (puedes usar uno fijo o traerlo desde $_POST o $_GET)
                $emailSender->addRecipient($_SESSION['usu_email'], $_SESSION['usu_nombre']);

                // Asunto y cuerpo del correo
                $asunto = 'Correo de prueba desde el sistema';
                $mensaje = '<h2>¡Hola!</h2><p>Este es un correo de prueba enviado desde PHP usando PHPMailer.</p>';

                // Enviar el correo
                if ($emailSender->sendEmail($asunto, $mensaje)) {
                    echo json_encode([
                        'estado' => true,
                        'mensaje' => 'Correo enviado correctamente.'
                    ]);
                }
            } catch (Exception $e) {
                echo json_encode([
                    'estado' => false,
                    'error' => $e->getMessage()
                ]);
            }
            break;

        default:
            echo json_encode([
                'estado' => false,
                'error' => 'Operación no reconocida.'
            ]);
            break;
    }
} else {
    echo json_encode([
        'estado' => false,
        'error' => 'No se especificó la operación.'
    ]);
}
