<?php

header('Content-Type: application/json');
require_once '../model/Usuario.php';

$usuario = new Usuario();

if (isset($_GET['op'])) {
    $op = $_GET['op'];

    switch ($op) {
        case 'Registrar':

            $usuario->setNombre($_POST['nombre']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $usuario->setRol(2); // Suponiendo que 2 es el rol por defecto
            $usuario->setId(0); // O si es autoincremental
            $usuario->setDireccion(null); // Si no se proporciona
            $usuario->setFechaRegistro(date('Y-m-d H:i:s')); // Fecha y hora actual
            $usuario->setActivo(0); // Por defecto activo

            $res = $usuario->registrarUsuario();
            echo json_encode($res);
            break;
    }
}
