<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PropuestaDetalleOutdoorRepository")
 * @ORM\Table(name="propuestas_detalle_outdoor")
 * @ORM\HasLifecycleCallbacks
 */
class PropuestaDetalleOutdoor extends GenericEntity
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
    protected  $pk_propuesta_detalle_outdoor;


    /**
     * @var PropuestaDetalle
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\PropuestaDetalle")
     * @ORM\JoinColumn(name="fk_propuesta_detalle", referencedColumnName="pk_propuesta_detalle")
     */
    protected $propuestaDetalle;

    /**
     * @var Medio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio")
     */
    protected $medio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $posicion_medio;

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
