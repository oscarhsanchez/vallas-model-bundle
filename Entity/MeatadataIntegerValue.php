<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\MetadataIntegerValueRepository")
 * @ORM\Table(name="metadata_integer_value")
 * @ORM\HasLifecycleCallbacks
 */
class MetadataIntegerValue extends GenericEntity
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
    protected  $pk_integer_value;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var MetadataRepository
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\MetadataRepository")
     * @ORM\JoinColumn(name="fk_metadata_repository", referencedColumnName="pk_metadata_repository")
     */
    public $metadata_repository;

    /**
     * @var MetadataStructure
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\MetadataStructure")
     * @ORM\JoinColumn(name="fk_metadata_structure", referencedColumnName="pk_metadata_structure")
     */
    public $metadata_structure;

    /**
     * @var MetadataInstance
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\MetadataInstance")
     * @ORM\JoinColumn(name="fk_metadata_instance", referencedColumnName="pk_metadata_instance")
     */
    public $metadata_instance;

    /** @ORM\Column(type="integer", nullable = false) */
    public $integer_value;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="integer", length=100, unique=true) */
    protected $token;

    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $estado = true;

}
