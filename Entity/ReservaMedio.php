<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ReservaMedioRepository")
 * @ORM\Table(name="reserva_medios")
 * @ORM\HasLifecycleCallbacks
 */
class ReservaMedio extends GenericEntity
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
    protected  $pk_reserva;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Plaza
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Plaza")
     * @ORM\JoinColumn(name="fk_plaza", referencedColumnName="pk_plaza")
     */
    protected $plaza;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_inicio;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_fin;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena;

    /**
     * @var PropuestaDetalle
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\PropuestaDetalle")
     * @ORM\JoinColumn(name="fk_propuesta_detalle", referencedColumnName="pk_propuesta_detalle")
     */
    protected $propuestaDetalle;

    /**
     * @var PropuestaDetalleOutdoor
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\PropuestaDetalleOutdoor")
     * @ORM\JoinColumn(name="fk_propuesta_detalle_outdoor", referencedColumnName="pk_propuesta_detalle_outdoor")
     */
    protected $propuestaDetalleOutdoor;

    /**
     * @var Medio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio")
     */
    protected $medio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $posicion_medio;

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
