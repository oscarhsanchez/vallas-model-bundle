<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ParametrosPropuestaRepository")
 * @ORM\Table(name="parametros_propuestas")
 * @ORM\HasLifecycleCallbacks
 */
class ParametrosPropuesta extends GenericEntity
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
    protected  $pk_parametros_propuesta;

    /** @ORM\Column(type="float") */
    protected $prespuesto;

    /** @ORM\Column(type="string", length=200) */
    protected $plazas;

    /** @ORM\Column(type="date") */
    protected $fecha_inicio;

    /** @ORM\Column(type="integer") */
    protected $catorcenas;

    /** @ORM\Column(type="text") */
    protected $lugares_cercanos;

    /** @ORM\Column(type="text") */
    protected $lugares_cercanos_restriccion;

    /** @ORM\Column(type="string", length=20) */
    protected $tipologia;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $iluminacion;

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
