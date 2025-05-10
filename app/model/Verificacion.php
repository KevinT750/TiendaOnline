<?php
require_once "../../config/Conexion.php";
class Verificacion
{
    private $id;
    private $id_usuario;
    private $codigo;
    private $expiracion;
    private $verificado;
    private $fecha_creacion;

    public function __construct($id = null, $id_usuario = null, $codigo = null, $expiracion = null, $verificado = null, $fecha_creacion = null)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->codigo = $codigo;
        $this->expiracion = $expiracion;
        $this->verificado = $verificado;
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getExpiracion()
    {
        return $this->expiracion;
    }

    public function setExpiracion($expiracion)
    {
        $this->expiracion = $expiracion;
    }

    public function getVerificado()
    {
        return $this->verificado;
    }

    public function setVerificado($verificado)
    {
        $this->verificado = $verificado;
    }

    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function ingresarDatos()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $op = 1;
        $id = 0;
        $id_usuario = $this->getIdUsuario();
        $codigo = $this->getCodigo();
        $expiracion = $this->getExpiracion();
        $verificado = $this->getVerificado();
        $fecha_creacion = $this->getFechaCreacion();

        // Validación de datos
        if (!isset($id_usuario, $codigo, $expiracion, $verificado, $fecha_creacion)) {
            return [
                "estado" => false,
                "mensaje" => "Datos incompletos para la verificación: " .
                    "usuario_id: " . var_export($id_usuario, true) . ", " .
                    "código: " . var_export($codigo, true) . ", " .
                    "expiración: " . var_export($expiracion, true) . ", " .
                    "verificado: " . var_export($verificado, true) . ", " .
                    "fecha creación: " . var_export($fecha_creacion, true),
            ];
        }

        $sql = "call tienda_online.sp_verificaciones($op, $id, $id_usuario, '$codigo', $expiracion, $verificado, '$fecha_creacion')";

        $result = ejecutarConsulta($sql);
        if ($result) {
            return [
                "estado" => true,
                "mensaje" => "Verificación ingresada correctamente",
            ];
        } else {

            return [
                "estado" => false,
                "mensaje" => "Error al ingresar la verificación: ",
            ];
        }
    }
}
