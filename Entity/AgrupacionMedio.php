<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\AgrupacionMedioRepository")
 * @ORM\Table(name="agrupacion_medios")
 * @ORM\HasLifecycleCallbacks
 */
class AgrupacionMedio extends GenericEntity
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
    protected  $pk_agrupacion;

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
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion", inversedBy="medios")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=140, nullable = false, unique=false)
     */
    protected $descripcion;


    /** @ORM\Column(type="smallint", nullable = false) */
    protected $tipo;

    /**
     * @ORM\Column(type="float")
     */
    protected $coste;

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
     * Get pkAgrupacion
     *
     * @return int
     */
    public function getPkAgrupacion()
    {
        return $this->pk_agrupacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return AgrupacionMedio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set tipo
     *
     * @param int $tipo
     *
     * @return AgrupacionMedio
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set coste
     *
     * @param float $coste
     *
     * @return AgrupacionMedio
     */
    public function setCoste($coste)
    {
        $this->coste = $coste;
    
        return $this;
    }

    /**
     * Get coste
     *
     * @return float
     */
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AgrupacionMedio
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
     * @return AgrupacionMedio
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
     * @return AgrupacionMedio
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
     * @return AgrupacionMedio
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
     * @return AgrupacionMedio
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
     * Set ubicacion
     *
     * @param \Vallas\ModelBundle\Entity\Ubicacion $ubicacion
     *
     * @return AgrupacionMedio
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
