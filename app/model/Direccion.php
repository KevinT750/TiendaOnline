<?php
class Direccion
{
    private $id;
    private $calle;
    private $ciudad;
    private $estado;
    private $codigo_postal;
    private $pais;

    public function __construct($id = null, $calle = null, $ciudad = null, $estado = null, $codigo_postal = null, $pais = null)
    {
        $this->id = $id;
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->estado = $estado;
        $this->codigo_postal = $codigo_postal;
        $this->pais = $pais;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getCalle()
    {
        return $this->calle;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCodigoPostal()
    {
        return $this->codigo_postal;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setCodigoPostal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
