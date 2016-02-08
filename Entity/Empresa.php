<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\EmpresaRepository")
 * @ORM\Table(name="empresas")
 * @ORM\HasLifecycleCallbacks
 */
class Empresa extends GenericEntity
{
    protected function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    protected function preSave()
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
    protected $pk_empresa;


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
     * @var string
     *
     * @ORM\Column(type="string", length=120, nullable = true, unique=false)
     */
    protected $razon_social;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable = true, unique=false)
     */
    protected $calle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = true, unique=false)
     */
    protected $numero_ext;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = true, unique=false)
     */
    protected $numero_int;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $colonia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $delegacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $estado_dir;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable = true, unique=false)
     */
    protected $cod_postal;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable = true, unique=false)
     */
    protected $telefono;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable = true, unique=false)
     */
    protected $celular;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable = true, unique=false)
     */
    protected $representante;

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
