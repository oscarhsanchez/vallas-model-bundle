<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ReservaMedioRepository")
 * @ORM\Table(name="reserva_medios")
 * @ORM\HasLifecycleCallbacks
 */
class ReservaMedio extends GenericEntity
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
    protected  $pk_reserva;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Plaza
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Plaza")
     * @ORM\JoinColumn(name="fk_plaza", referencedColumnName="pk_plaza")
     */
    protected $plaza;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_inicio;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_fin;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena;

    /**
     * @var PropuestaDetalle
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\PropuestaDetalle")
     * @ORM\JoinColumn(name="fk_propuesta_detalle", referencedColumnName="pk_propuesta_detalle")
     */
    protected $propuestaDetalle;

    /**
     * @var PropuestaDetalleOutdoor
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\PropuestaDetalleOutdoor")
     * @ORM\JoinColumn(name="fk_propuesta_detalle_outdoor", referencedColumnName="pk_propuesta_detalle_outdoor")
     */
    protected $propuestaDetalleOutdoor;

    /**
     * @var Medio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio")
     */
    protected $medio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $posicion_medio;

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
     * Get pkReserva
     *
     * @return int
     */
    public function getPkReserva()
    {
        return $this->pk_reserva;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return ReservaMedio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return ReservaMedio
     */
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set catorcena
     *
     * @param int $catorcena
     *
     * @return ReservaMedio
     */
    public function setCatorcena($catorcena)
    {
        $this->catorcena = $catorcena;
    
        return $this;
    }

    /**
     * Get catorcena
     *
     * @return int
     */
    public function getCatorcena()
    {
        return $this->catorcena;
    }

    /**
     * Set posicionMedio
     *
     * @param int $posicionMedio
     *
     * @return ReservaMedio
     */
    public function setPosicionMedio($posicionMedio)
    {
        $this->posicion_medio = $posicionMedio;
    
        return $this;
    }

    /**
     * Get posicionMedio
     *
     * @return int
     */
    public function getPosicionMedio()
    {
        return $this->posicion_medio;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ReservaMedio
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
     * @return ReservaMedio
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
     * @return ReservaMedio
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
     * @param int $estado
     *
     * @return ReservaMedio
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return int
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
     * @return ReservaMedio
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
     * Set plaza
     *
     * @param \Vallas\ModelBundle\Entity\Plaza $plaza
     *
     * @return ReservaMedio
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
     * Set propuestaDetalle
     *
     * @param \Vallas\ModelBundle\Entity\PropuestaDetalle $propuestaDetalle
     *
     * @return ReservaMedio
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
     * Set propuestaDetalleOutdoor
     *
     * @param \Vallas\ModelBundle\Entity\PropuestaDetalleOutdoor $propuestaDetalleOutdoor
     *
     * @return ReservaMedio
     */
    public function setPropuestaDetalleOutdoor(\Vallas\ModelBundle\Entity\PropuestaDetalleOutdoor $propuestaDetalleOutdoor = null)
    {
        $this->propuestaDetalleOutdoor = $propuestaDetalleOutdoor;
    
        return $this;
    }

    /**
     * Get propuestaDetalleOutdoor
     *
     * @return \Vallas\ModelBundle\Entity\PropuestaDetalleOutdoor
     */
    public function getPropuestaDetalleOutdoor()
    {
        return $this->propuestaDetalleOutdoor;
    }

    /**
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return ReservaMedio
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
