<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use ESocial\ModelBundle\Entity\GenericEntity;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\UserGeoRepository")
 * @ORM\Table(name="user_geo")
 * @ORM\HasLifecycleCallbacks
 */
class UserGeo extends GenericEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="pk_user_geo")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    protected $user;

    /** @ORM\Column(type="datetime", nullable=true) */
    protected $fecha;

    /** @ORM\Column(type="float", nullable=true) */
    protected $longitud;

    /** @ORM\Column(type="float", nullable=true) */
    protected $latitud;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return UserGeo
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
     * Set longitud
     *
     * @param float $longitud
     *
     * @return UserGeo
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set latitud
     *
     * @param float $latitud
     *
     * @return UserGeo
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set user
     *
     * @param \Vallas\ModelBundle\Entity\User $user
     *
     * @return UserGeo
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
