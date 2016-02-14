<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\AccionClienteRepository")
 * @ORM\Table(name="acciones_clientes")
 * @ORM\HasLifecycleCallbacks
 */
class AccionCliente extends GenericEntity
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
    public $pk_accion;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente")
     */
    public $cliente;

    /**
     * @var TipoAccion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\TipoAccion")
     * @ORM\JoinColumn(name="fk_tipo_accion", referencedColumnName="pk_tipo_accion")
     */
    public $tipo_accion;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="codigo_user", referencedColumnName="codigo", nullable=true)
     */
    protected $user;

    /** @ORM\Column(type="date", nullable = false) */
    public $fecha;

    /** @ORM\Column(type="time", nullable = false) */
    public $hora;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable = false, unique=false)
     */
    public $titulo;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable = true, unique=false)
     */
    public $resumen;

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
