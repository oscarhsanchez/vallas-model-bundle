<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PropuestaDetalleRepository")
 * @ORM\Table(name="propuestas_detalle")
 * @ORM\HasLifecycleCallbacks
 */
class PropuestaDetalle extends GenericEntity
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
     * @ORM\Column(type="string", length=100)
     * @ORM\GeneratedValue
     */
    protected  $pk_propuesta_detalle;


    /**
     * @var Propuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Propuesta")
     * @ORM\JoinColumn(name="fk_propuesta", referencedColumnName="pk_propuesta")
     */
    protected $propuesta;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var Plaza
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Plaza")
     * @ORM\JoinColumn(name="fk_plaza", referencedColumnName="pk_plaza")
     */
    protected $plaza;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable = false, unique=false)
     */
    protected $unidad_negocio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = true, unique=false)
     */
    protected $clasificacion;

    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

    /**
     * @var TipoMedio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\TipoMedio")
     * @ORM\JoinColumn(name="fk_tipo", referencedColumnName="pk_tipo", nullable=true)
     */
    protected $tipoMedio;

    /**
     * @var SubtipoMedio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\SubtipoMedio")
     * @ORM\JoinColumn(name="fk_subtipo", referencedColumnName="pk_subtipo")
     */
    protected $subtipoMedio;



    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = false, unique=false)
     */
    protected $tipo_negociacion;

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

    /** @ORM\Column(type="integer", nullable = false) */
    protected $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $total;

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
     * Get pkPropuestaDetalle
     *
     * @return string
     */
    public function getPkPropuestaDetalle()
    {
        return $this->pk_propuesta_detalle;
    }

    /**
     * Set unidadNegocio
     *
     * @param string $unidadNegocio
     *
     * @return PropuestaDetalle
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
     * @return PropuestaDetalle
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
     * Set moneda
     *
     * @param string $moneda
     *
     * @return PropuestaDetalle
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
     * @return PropuestaDetalle
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
     * @return PropuestaDetalle
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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return PropuestaDetalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return PropuestaDetalle
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return PropuestaDetalle
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
     * @return PropuestaDetalle
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
     * @return PropuestaDetalle
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
     * @return PropuestaDetalle
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
     * Set propuesta
     *
     * @param \Vallas\ModelBundle\Entity\Propuesta $propuesta
     *
     * @return PropuestaDetalle
     */
    public function setPropuesta(\Vallas\ModelBundle\Entity\Propuesta $propuesta = null)
    {
        $this->propuesta = $propuesta;

        return $this;
    }

    /**
     * Get propuesta
     *
     * @return \Vallas\ModelBundle\Entity\Propuesta
     */
    public function getPropuesta()
    {
        return $this->propuesta;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return PropuestaDetalle
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais = null)
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
     * Set plaza
     *
     * @param \Vallas\ModelBundle\Entity\Plaza $plaza
     *
     * @return PropuestaDetalle
     */
    public function setPlaza(\Vallas\ModelBundle\Entity\Plaza $plaza = null)
    {
        $this->plaza = $plaza;

        return $this;
    }

    /**
     * Get plaza
     *
     * @return \Vallas\ModelBundle\Entity\Plaza
     */
    public function getPlaza()
    {
        return $this->plaza;
    }

    /**
     * Set ubicacion
     *
     * @param \Vallas\ModelBundle\Entity\Ubicacion $ubicacion
     *
     * @return PropuestaDetalle
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
