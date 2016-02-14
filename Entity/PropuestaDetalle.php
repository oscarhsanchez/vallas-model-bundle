<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PropuestaDetalleRepository")
 * @ORM\Table(name="propuestas_detalle")
 * @ORM\HasLifecycleCallbacks
 */
class PropuestaDetalle extends GenericEntity
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
    protected  $pk_propuesta_detalle;


    /**
     * @var Propuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Propuesta")
     * @ORM\JoinColumn(name="fk_propuesta", referencedColumnName="pk_propuesta")
     */
    protected $propuesta;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var Plaza
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Plaza")
     * @ORM\JoinColumn(name="fk_plaza", referencedColumnName="pk_plaza")
     */
    protected $plaza;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable = false, unique=false)
     */
    protected $unidad_negocio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = false, unique=false)
     */
    protected $tipo_negociacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = false, unique=false)
     */
    protected $moneda;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $precio;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $tipo_cambio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $total;

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
