<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\LogOrdenTrabajoRepository")
 * @ORM\Table(name="log_ordenes_trabajo")
 * @ORM\HasLifecycleCallbacks
 */
class LogOrdenTrabajo extends GenericEntity
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
    protected $id;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var OrdenTrabajo
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\OrdenTrabajo", inversedBy="logs")
     * @ORM\JoinColumn(name="fk_orden_trabajo", referencedColumnName="pk_orden_trabajo", nullable=false)
     */
    protected $orden_trabajo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $fecha;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = false)
     */
    protected $accion;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return LogOrdenTrabajo
     */
    public function setCodigoUser($codigoUser)
    {
        $this->codigo_user = $codigoUser;

        return $this;
    }

    /**
     * Get codigoUser
     *
     * @return string
     */
    public function getCodigoUser()
    {
        return $this->codigo_user;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return LogOrdenTrabajo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set accion
     *
     * @param string $accion
     *
     * @return LogOrdenTrabajo
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return LogOrdenTrabajo
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
     * @return LogOrdenTrabajo
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
     * @return LogOrdenTrabajo
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
     * @return LogOrdenTrabajo
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
     * @return LogOrdenTrabajo
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
     * Set ordenTrabajo
     *
     * @param \Vallas\ModelBundle\Entity\OrdenTrabajo $ordenTrabajo
     *
     * @return LogOrdenTrabajo
     */
    public function setOrdenTrabajo(\Vallas\ModelBundle\Entity\OrdenTrabajo $ordenTrabajo)
    {
        $this->orden_trabajo = $ordenTrabajo;

        return $this;
    }

    /**
     * Get ordenTrabajo
     *
     * @return \Vallas\ModelBundle\Entity\OrdenTrabajo
     */
    public function getOrdenTrabajo()
    {
        return $this->orden_trabajo;
    }
}
