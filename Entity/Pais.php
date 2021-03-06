<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PaisRepository")
 * @ORM\Table(name="paises")
 * @ORM\HasLifecycleCallbacks
 */
class Pais extends GenericEntity
{
    public function __toString() {
        return $this->getNombre();
    }

    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
        $this->user_paises = new ArrayCollection();
    }

    public function setUserPaises(\Doctrine\Common\Collections\Collection $user_paises){
        $this->user_paises = $user_paises;
        foreach ($user_paises as $c) {
            $c->setPais($this);
        }
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
     * @ORM\Column(type="string", length=5)
     */
    protected $pk_pais;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = false, unique=true)
     */
    protected $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Vallas\ModelBundle\Entity\UserPais", mappedBy="pais", cascade={"persist", "remove"})
     */
    protected $user_paises;

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
     * Get pk_pais
     *
     * @return string
     */
    public function getPkPais()
    {
        return $this->pk_pais;
    }

    /**
     * Set pk_pais
     *
     * @param string $pk_pais
     *
     * @return Report
     */
    public function setPkPais($pk_pais)
    {
        $this->pk_pais = $pk_pais;

        return $this;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Report
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get access_token
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
     * @return Report
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
     * @return Report
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
     * @return Report
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
     * @return Report
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
     * Add userPaise
     *
     * @param \Vallas\ModelBundle\Entity\UserPais $userPaise
     *
     * @return Pais
     */
    public function addUserPaise(\Vallas\ModelBundle\Entity\UserPais $userPaise)
    {
        $this->user_paises[] = $userPaise;

        return $this;
    }

    /**
     * Remove userPaise
     *
     * @param \Vallas\ModelBundle\Entity\UserPais $userPaise
     */
    public function removeUserPaise(\Vallas\ModelBundle\Entity\UserPais $userPaise)
    {
        $this->user_paises->removeElement($userPaise);
    }

    /**
     * Get userPaises
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserPaises()
    {
        return $this->user_paises;
    }
}
