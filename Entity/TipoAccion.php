<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\TipoAccionRepository")
 * @ORM\Table(name="tipos_acciones")
 * @ORM\HasLifecycleCallbacks
 */
class TipoAccion extends GenericEntity
{
    public function __toString() {
        return $this->getNombre();
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
    protected $pk_tipo_accion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = false, unique=true)
     */
    protected $descripcion;


    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $estado = true;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="string", length=100, unique=true) */
    protected $token;


}
