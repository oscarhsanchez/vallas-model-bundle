<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\AgrupacionMedioDetalleRepository")
 * @ORM\Table(name="agrupacion_medios_detalle")
 * @ORM\HasLifecycleCallbacks
 */
class AgrupacionMedioDetalle extends GenericEntity
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
    protected  $pk_agrupacion_detalle;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var AgrupacionMedio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\AgrupacionMedio")
     * @ORM\JoinColumn(name="fk_agruapcion", referencedColumnName="pk_agrupacion", nullable=false)
     */
    protected $agrupacion_medio;

    /**
     * @var Medio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio", nullable=false)
     */
    protected $medio;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $factor_agrupacion;


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
     * Get pkAgrupacionDetalle
     *
     * @return int
     */
    public function getPkAgrupacionDetalle()
    {
        return $this->pk_agrupacion_detalle;
    }

    /**
     * Set factorAgrupacion
     *
     * @param float $factorAgrupacion
     *
     * @return AgrupacionMedioDetalle
     */
    public function setFactorAgrupacion($factorAgrupacion)
    {
        $this->factor_agrupacion = $factorAgrupacion;
    
        return $this;
    }

    /**
     * Get factorAgrupacion
     *
     * @return float
     */
    public function getFactorAgrupacion()
    {
        return $this->factor_agrupacion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AgrupacionMedioDetalle
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
     * @return AgrupacionMedioDetalle
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
     * @return AgrupacionMedioDetalle
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
     * @return AgrupacionMedioDetalle
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
     * @return AgrupacionMedioDetalle
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
     * Set agrupacionMedio
     *
     * @param \Vallas\ModelBundle\Entity\AgrupacionMedio $agrupacionMedio
     *
     * @return AgrupacionMedioDetalle
     */
    public function setAgrupacionMedio(\Vallas\ModelBundle\Entity\AgrupacionMedio $agrupacionMedio)
    {
        $this->agrupacion_medio = $agrupacionMedio;
    
        return $this;
    }

    /**
     * Get agrupacionMedio
     *
     * @return \Vallas\ModelBundle\Entity\AgrupacionMedio
     */
    public function getAgrupacionMedio()
    {
        return $this->agrupacion_medio;
    }

    /**
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return AgrupacionMedioDetalle
     */
    public function setMedio(\Vallas\ModelBundle\Entity\Medio $medio)
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
