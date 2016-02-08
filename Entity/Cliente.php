<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ClienteRepository")
 * @ORM\Table(name="clientes")
 * @ORM\HasLifecycleCallbacks
 */
class Cliente extends GenericEntity
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
    public $pk_cliente;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable = false, unique=true)
     */
    protected $rfc;

    /**
     * @var Empresa
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Empresa")
     * @ORM\JoinColumn(name="fk_empresa", referencedColumnName="pk_empresa")
     */
    public $empresa;

    /**
     * @var Empresa
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    public $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = true, unique=false)
     */
    public $razon_social;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    public $nombre_comercial;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    public $porcentaje_comision;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    public $dias_credito;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    public $credito_maximo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    public $estatus;

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
