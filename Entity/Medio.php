<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\MedioRepository")
 * @ORM\Table(name="medios")
 * @ORM\HasLifecycleCallbacks
 */
class Medio extends GenericEntity
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
     * @ORM\Column(type="string", length=20 )
     */
    protected $pk_medio;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $fk_pais;

    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

    /**
     * @var SubtipoMedio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\SubtipoMedio")
     * @ORM\JoinColumn(name="fk_subtipo", referencedColumnName="pk_subtipo")
     */
    protected $subtipoMedio;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $posicion;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $id_cara;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $tipo_medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=6, nullable = true, unique=false)
     */
    protected $estatus_iluminacion;

    /**
     * @ORM\Column(type="integer", options={"default":1})
     */
    protected $slots=1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = true, unique=false)
     */
    protected $estatus_inventario;

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
