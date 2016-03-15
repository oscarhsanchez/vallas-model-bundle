<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PropuestaDetalleOutdoorRepository")
 * @ORM\Table(name="propuestas_detalle_outdoor")
 * @ORM\HasLifecycleCallbacks
 */
class PropuestaDetalleOutdoor extends GenericEntity
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
    protected  $pk_propuesta_detalle_outdoor;


    /**
     * @var PropuestaDetalle
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\PropuestaDetalle")
     * @ORM\JoinColumn(name="fk_propuesta_detalle", referencedColumnName="pk_propuesta_detalle")
     */
    protected $propuestaDetalle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable = false, unique=false)
     */
    protected $unidad_negocio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = false, unique=false)
     */
    protected $tipo_negociacion;

    /**
     * @var Medio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio")
     */
    protected $medio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $posicion_medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = false, unique=false)
     */
    protected $moneda;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $precio;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $tipo_cambio;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $pautado = true;

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
     * Get pkPropuestaDetalleOutdoor
     *
     * @return integer
     */
    public function getPkPropuestaDetalleOutdoor()
    {
        return $this->pk_propuesta_detalle_outdoor;
    }

    /**
     * Set unidadNegocio
     *
     * @param string $unidadNegocio
     *
     * @return PropuestaDetalleOutdoor
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
     * Set tipoNegociacion
     *
     * @param string $tipoNegociacion
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setTipoNegociacion($tipoNegociacion)
    {
        $this->tipo_negociacion = $tipoNegociacion;

        return $this;
    }

    /**
     * Get tipoNegociacion
     *
     * @return string
     */
    public function getTipoNegociacion()
    {
        return $this->tipo_negociacion;
    }

    /**
     * Set posicionMedio
     *
     * @param integer $posicionMedio
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setPosicionMedio($posicionMedio)
    {
        $this->posicion_medio = $posicionMedio;

        return $this;
    }

    /**
     * Get posicionMedio
     *
     * @return integer
     */
    public function getPosicionMedio()
    {
        return $this->posicion_medio;
    }

    /**
     * Set moneda
     *
     * @param string $moneda
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return string
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set tipoCambio
     *
     * @param float $tipoCambio
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setTipoCambio($tipoCambio)
    {
        $this->tipo_cambio = $tipoCambio;

        return $this;
    }

    /**
     * Get tipoCambio
     *
     * @return float
     */
    public function getTipoCambio()
    {
        return $this->tipo_cambio;
    }

    /**
     * Set pautado
     *
     * @param integer $pautado
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setPautado($pautado)
    {
        $this->pautado = $pautado;

        return $this;
    }

    /**
     * Get pautado
     *
     * @return integer
     */
    public function getPautado()
    {
        return $this->pautado;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PropuestaDetalleOutdoor
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
     * @return PropuestaDetalleOutdoor
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
     * @return PropuestaDetalleOutdoor
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
     * @return PropuestaDetalleOutdoor
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
     * Set propuestaDetalle
     *
     * @param \Vallas\ModelBundle\Entity\PropuestaDetalle $propuestaDetalle
     *
     * @return PropuestaDetalleOutdoor
     */
    public function setPropuestaDetalle(\Vallas\ModelBundle\Entity\PropuestaDetalle $propuestaDetalle = null)
    {
        $this->propuestaDetalle = $propuestaDetalle;

        return $this;
    }

    /**
     * Get propuestaDetalle
     *
     * @return \Vallas\ModelBundle\Entity\PropuestaDetalle
     */
    public function getPropuestaDetalle()
    {
        return $this->propuestaDetalle;
    }

    /**
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return PropuestaDetalleOutdoor
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
}
