<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\GastoRepository")
 * @ORM\Table(name="gastos")
 * @ORM\HasLifecycleCallbacks
 */
class Gasto extends GenericEntity
{
    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preSave()
    {
        if($this->created_at == null){
            $this->created_at = new \DateTime();
        }
        $this->updated_at = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $pk_gasto;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

    /** @ORM\Column(type="string", length=14, nullable = false, unique=false) */
    protected $unidad_negocio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $anio;

    /** @ORM\Column(type="string", length=20, nullable = false, unique=false) */
    protected $mes;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $mes_numero;

    /** @ORM\Column(type="string", length=60, nullable = false, unique=false) */
    protected $departamento;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $importe;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="string", length=100, unique=true) */
    protected $token;

    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $estado = true;


    /**
     * Get pkGasto
     *
     * @return integer
     */
    public function getPkGasto()
    {
        return $this->pk_gasto;
    }

    /**
     * Set unidadNegocio
     *
     * @param string $unidadNegocio
     *
     * @return Gasto
     */
    public function setUnidadNegocio($unidadNegocio)
    {
        $this->unidad_negocio = $unidadNegocio;

        return $this;
    }

    /**
     * Get unidadNegocio
     *
     * @return string
     */
    public function getUnidadNegocio()
    {
        return $this->unidad_negocio;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     *
     * @return Gasto
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return integer
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set mes
     *
     * @param string $mes
     *
     * @return Gasto
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set mesNumero
     *
     * @param integer $mesNumero
     *
     * @return Gasto
     */
    public function setMesNumero($mesNumero)
    {
        $this->mes_numero = $mesNumero;

        return $this;
    }

    /**
     * Get mesNumero
     *
     * @return integer
     */
    public function getMesNumero()
    {
        return $this->mes_numero;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     *
     * @return Gasto
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set importe
     *
     * @param float $importe
     *
     * @return Gasto
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get importe
     *
     * @return float
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Gasto
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Gasto
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Gasto
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Gasto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return Gasto
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \Vallas\ModelBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return Gasto
     */
    public function setMedio(\Vallas\ModelBundle\Entity\Medio $medio = null)
    {
        $this->medio = $medio;

        return $this;
    }

    /**
     * Get medio
     *
     * @return \Vallas\ModelBundle\Entity\Medio
     */
    public function getMedio()
    {
        return $this->medio;
    }

    /**
     * Set ubicacion
     *
     * @param \Vallas\ModelBundle\Entity\Ubicacion $ubicacion
     *
     * @return Gasto
     */
    public function setUbicacion(\Vallas\ModelBundle\Entity\Ubicacion $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return \Vallas\ModelBundle\Entity\Ubicacion
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }
}
