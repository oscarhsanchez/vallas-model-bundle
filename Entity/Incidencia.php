<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\IncidenciaRepository")
 * @ORM\Table(name="incidencias")
 * @ORM\HasLifecycleCallbacks
 */
class Incidencia extends GenericEntity
{

    public function __toString(){
        $desc = '';

        if ($this->getFechaLimite()){
            $desc .= $this->getFechaLimite()->format('d/m/Y');
        }

        if ($this->getMedio() && $this->getMedio()->getUbicacion()){
            $desc .= ' - '. $this->getMedio()->getUbicacion();
        }

        if ($this->getCodigoUser()){
            $desc .= ' - '. $this->getCodigoUser();
        }

        return $desc;

    }

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
    public $pk_incidencia;

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
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio", nullable=true)
     */
    protected $medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user_asignado;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $tipo;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $estado_incidencia;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    protected $fecha_limite;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fecha_cierre;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true, unique=false)
     */
    protected $observaciones;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true, unique=false)
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

    /**
     * @ORM\OneToMany(targetEntity="ImagenIncidencia", mappedBy="incidencia", cascade={"persist","remove"})
     **/
    protected $imagenes;


}
