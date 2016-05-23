<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ZonaRepository")
 * @ORM\Table(name="zonas")
 * @ORM\HasLifecycleCallbacks
 */
class Zona extends GenericEntity
{
    public function __toString() {
        return $this->getNombre();
    }

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
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $pk_zona;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = false, unique=false)
     */
    protected $nombre;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $estado = true;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="string", length=100, unique=true) */
    protected $token;


    /**
     * Set pkZona
     *
     * @param string $pkZona
     *
     * @return Zona
     */
    public function setPkZona($pkZona)
    {
        $this->pk_zona = $pkZona;

        return $this;
    }

    /**
     * Get pkZona
     *
     * @return string
     */
    public function getPkZona()
    {
        return $this->pk_zona;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Zona
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Zona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Zona
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Zona
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
     * @return Zona
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
     * @return Zona
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
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return AccionCliente
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
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return Zona
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
     * Set user
     *
     * @param \Vallas\ModelBundle\Entity\User $user
     *
     * @return Zona
     */
    public function setUser(\Vallas\ModelBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Vallas\ModelBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
