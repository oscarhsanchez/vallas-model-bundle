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
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable = false, unique=false)
     */
    protected $name;

    /**
     * @var MetaUbicacionFQ
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\MetaUbicacionFQ")
     * @ORM\JoinColumn(name="fk_category", referencedColumnName="id", nullable=false)
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


}
