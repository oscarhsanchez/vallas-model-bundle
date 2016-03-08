<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\OrdenTrabajoRepository")
 * @ORM\Table(name="ordenes_trabajo")
 * @ORM\HasLifecycleCallbacks
 */
class OrdenTrabajo extends GenericEntity
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
    public $pk_orden_trabajo;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Propuesta")
     * @ORM\JoinColumn(name="fk_propuesta", referencedColumnName="pk_propuesta", nullable=true)
     */
    protected $propuesta;


    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio")
     */
    protected $medio;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="codigo_user", referencedColumnName="codigo", nullable=true)
     */
    protected $user;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $tipo;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $estado_orden;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    protected $fecha_limite;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $fecha_cierre;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable = false, unique=false)
     */
    protected $observaciones;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable = false, unique=false)
     */
    protected $observaciones_cierre;

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
