<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ImagenRepository")
 * @ORM\Table(name="imagenes")
 * @ORM\HasLifecycleCallbacks
 */
class Imagen extends GenericEntity
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
    protected $pk_archivo;

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
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\OrdenTrabajo")
     * @ORM\JoinColumn(name="fk_orden_trabajo", referencedColumnName="pk_orden_trabajo", nullable=false)
     */
    protected $orden_trabajo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = false, unique=false)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = false, unique=false)
     */
    protected $path;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = false, unique=false)
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable = true, unique=false)
     */
    protected $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable = true, unique=false)
     */
    protected $observaciones_cliente;

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
