<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ContactoClienteRepository")
 * @ORM\Table(name="contactos_clientes")
 * @ORM\HasLifecycleCallbacks
 */
class ContactoCliente extends GenericEntity
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
    protected $pk_contacto_cliente;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente")
     */
    protected $cliente;

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
     * @ORM\Column(type="string", length=60, nullable = false, unique=false)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40, nullable = true, unique=false)
     */
    protected $titulo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable = true, unique=false)
     */
    protected $cargo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable = true, unique=false)
     */
    protected $telefono;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable = true, unique=false)
     */
    protected $celular;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $email;

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
