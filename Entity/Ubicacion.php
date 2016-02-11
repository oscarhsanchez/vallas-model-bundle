<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\UbicacionRepository")
 * @ORM\Table(name="ubicaciones")
 * @ORM\HasLifecycleCallbacks
 */
class Ubicacion extends GenericEntity
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
     * @ORM\Column(type="string", length=6)
     */
    protected $pk_ubicacion;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var Empresa
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Empresa")
     * @ORM\JoinColumn(name="fk_empresa", referencedColumnName="pk_empresa")
     */
    protected $empresa;

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
     * @ORM\Column(type="string", length=14, nullable = true, unique=false)
     */
    protected $unidad_negocio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=80, nullable = true, unique=false)
     */
    protected $tipo_medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable = true, unique=false)
     */
    protected $estatus;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable = true, unique=false)
     */
    protected $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=120, nullable = true, unique=false)
     */
    protected $direccion_comercial;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=120, nullable = true, unique=false)
     */
    protected $referencia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=6, nullable = true, unique=false)
     */
    protected $categoria;

    /** @ORM\Column(type="integer", nullable = true) */
    protected $catorcena;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $anio;

    /** @ORM\Column(type="date", nullable = true) */
    protected $fecha_instalacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=160, nullable = true, unique=false)
     */
    protected $observaciones;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $latitud;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $longitud;


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
