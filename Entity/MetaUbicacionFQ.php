<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\MetaUbicacionFQRepository")
 * @ORM\Table(name="meta_ubicacion_fq")
 * @ORM\HasLifecycleCallbacks
 */
class MetaUbicacionFQ extends GenericEntity
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
     */
    protected  $id;

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
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable = false, unique=false)
     */
    protected $name;

    /**
     * @var MetaUbicacionFQ
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\MetaUbicacionFQCat")
     * @ORM\JoinColumn(name="fk_category", referencedColumnName="id", nullable=true)
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = true, unique=false)
     */
    protected $phone;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable = false, unique=false)
     */
    protected $lat;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable = false, unique=false)
     */
    protected $lon;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable = false, unique=false)
     */
    protected $distance;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable = false, unique=false)
     */
    protected $checkinscount;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable = false, unique=false)
     */
    protected $userscount;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable = false, unique=false)
     */
    protected $tipcount;

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
     * Set id
     *
     * @param string $id
     *
     * @return MetaUbicacionFQ
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MetaUbicacionFQ
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return MetaUbicacionFQ
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return MetaUbicacionFQ
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param float $lon
     *
     * @return MetaUbicacionFQ
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return MetaUbicacionFQ
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set checkinscount
     *
     * @param integer $checkinscount
     *
     * @return MetaUbicacionFQ
     */
    public function setCheckinscount($checkinscount)
    {
        $this->checkinscount = $checkinscount;

        return $this;
    }

    /**
     * Get checkinscount
     *
     * @return integer
     */
    public function getCheckinscount()
    {
        return $this->checkinscount;
    }

    /**
     * Set userscount
     *
     * @param integer $userscount
     *
     * @return MetaUbicacionFQ
     */
    public function setUserscount($userscount)
    {
        $this->userscount = $userscount;

        return $this;
    }

    /**
     * Get userscount
     *
     * @return integer
     */
    public function getUserscount()
    {
        return $this->userscount;
    }

    /**
     * Set tipcount
     *
     * @param integer $tipcount
     *
     * @return MetaUbicacionFQ
     */
    public function setTipcount($tipcount)
    {
        $this->tipcount = $tipcount;

        return $this;
    }

    /**
     * Get tipcount
     *
     * @return integer
     */
    public function getTipcount()
    {
        return $this->tipcount;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MetaUbicacionFQ
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
     * @return MetaUbicacionFQ
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
     * @return MetaUbicacionFQ
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
     * @return MetaUbicacionFQ
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
     * @return MetaUbicacionFQ
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
     * @return MetaUbicacionFQ
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

    /**
     * Set category
     *
     * @param \Vallas\ModelBundle\Entity\MetaUbicacionFQCat $category
     *
     * @return MetaUbicacionFQ
     */
    public function setCategory(\Vallas\ModelBundle\Entity\MetaUbicacionFQCat $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Vallas\ModelBundle\Entity\MetaUbicacionFQCat
     */
    public function getCategory()
    {
        return $this->category;
    }
}
