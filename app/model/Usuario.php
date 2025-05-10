<?php
require_once "../../config/Conexion.php";

class Usuario
{
    private $id;
    private $rol;
    private $nombre;
    private $direccion;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;

    public function __construct($id = null, $rol = null, $nombre = null, $direccion = null, $email = null, $password = null, $fecha_registro = null, $activo = null)
    {
        $this->id = $id;
        $this->rol = $rol;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function registrarUsuario()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $op = 1;
        $rol = $this->getRol();
        $id = $this->getId();
        $direccion = $this->getDireccion();
        $nombre = $this->getNombre();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $fecha = $this->getFechaRegistro();
        $activo = $this->getActivo();

        $sql = "CALL sp_usuario(
        $op,
        " . ($id !== null ? $id : 'NULL') . ",
        " . ($rol !== null ? $rol : 'NULL') . ",
        " . ($direccion !== null ? "'$direccion'" : 'NULL') . ",
        " . ($nombre !== null ? "'$nombre'" : 'NULL') . ",
        " . ($email !== null ? "'$email'" : 'NULL') . ",
        " . ($password !== null ? "'$password'" : 'NULL') . ",
        " . ($fecha !== null ? "'$fecha'" : 'NULL') . ",
        " . ($activo !== null ? $activo : 'NULL') . "
    );";

        $resultado = ejecutarConsulta($sql);
        $verificacion = new Verificacion();
        if ($resultado && $resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $_SESSION['usu_id'] = $row['id'];
            return [
                "estado" => true,
                "mensaje" => "Usuario registrado correctamente",
                "id" => $row['id']
            ];
        }
    }
}
