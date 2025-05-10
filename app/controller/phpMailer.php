<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
    header("Location: login.html");
    exit();
}

require_once '../model/phpMailer.php';

$emailSender = new EmailSender(
    'smtp.gmail.com', // Servidor SMTP
    'kevinteran750@gmail.com', // Usuario SMTP
    'cdci zcqv hmys psxh', // Contraseña SMTP (Verifica si es correcta)
    465, // Puerto correcto para SSL
    'ssl' // Seguridad
);


if (isset($_GET['op'])) {
    $op = $_GET['op'];

    switch ($op){
        case 'enviarCorreo':
            
            break;
    }

} else {
    echo json_encode([
        'estado' => false,
        'error' => 'No se especificó la operación.'
    ]);
}
?>
