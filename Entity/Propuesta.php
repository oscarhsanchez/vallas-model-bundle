<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PropuestaRepository")
 * @ORM\Table(name="propuestas")
 * @ORM\HasLifecycleCallbacks
 */
class Propuesta extends GenericEntity
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
    protected  $pk_propuesta;

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
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente")
     */
    protected $cliente;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $anio;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_inicio;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_fin;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena;

    /**
     * @var Agencia
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\CategoriaPropuesta")
     * @ORM\JoinColumn(name="fk_categoria_propuesta", referencedColumnName="pk_categoria_propuesta", nullable=true)
     */
    protected $categoria;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="codigo_user", referencedColumnName="codigo", nullable=true)
     */
    protected $user;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $comision_user;

    /**
     * @var Agencia
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Agencia")
     * @ORM\JoinColumn(name="fk_agencia", referencedColumnName="pk_agencia", nullable=true)
     */
    protected $agencia;


    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $comision_agencia;

    /** @ORM\Column(type="text") */
    protected $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=12, nullable = false, unique=false)
     */
    protected $status;

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
