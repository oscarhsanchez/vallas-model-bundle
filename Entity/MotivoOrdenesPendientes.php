<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\MotivoOrdenesPendientesRepository")
 * @ORM\Table(name="motivos_ordenes_pendientes")
 * @ORM\HasLifecycleCallbacks
 */
class MotivoOrdenesPendientes extends GenericEntity
{

    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
    }

    public function __toString(){
        return $this->getDescripcion();
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
    public $pk_motivo;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $tipo_incidencia;

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
     * Get pkMotivo
     *
     * @return integer
     */
    public function getPkMotivo()
    {
        return $this->pk_motivo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return MotivoOrdenesPendientes
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
     * Set tipoIncidencia
     *
     * @param integer $tipoIncidencia
     *
     * @return MotivoOrdenesPendientes
     */
    public function setTipoIncidencia($tipoIncidencia)
    {
        $this->tipo_incidencia = $tipoIncidencia;

        return $this;
    }

    /**
     * Get tipoIncidencia
     *
     * @return integer
     */
    public function getTipoIncidencia()
    {
        return $this->tipo_incidencia;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MotivoOrdenesPendientes
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
     * @return MotivoOrdenesPendientes
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
     * @return MotivoOrdenesPendientes
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
     * @return MotivoOrdenesPendientes
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
     * @return MotivoOrdenesPendientes
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
}
