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
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
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





    /**
     * Get pkEmpresa
     *
     * @return integer
     */
    public function getPkEmpresa()
    {
        return $this->pk_empresa;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return Empresa
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Empresa
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razon_social = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return Empresa
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numeroExt
     *
     * @param string $numeroExt
     *
     * @return Empresa
     */
    public function setNumeroExt($numeroExt)
    {
        $this->numero_ext = $numeroExt;

        return $this;
    }

    /**
     * Get numeroExt
     *
     * @return string
     */
    public function getNumeroExt()
    {
        return $this->numero_ext;
    }

    /**
     * Set numeroInt
     *
     * @param string $numeroInt
     *
     * @return Empresa
     */
    public function setNumeroInt($numeroInt)
    {
        $this->numero_int = $numeroInt;

        return $this;
    }

    /**
     * Get numeroInt
     *
     * @return string
     */
    public function getNumeroInt()
    {
        return $this->numero_int;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     *
     * @return Empresa
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set delegacion
     *
     * @param string $delegacion
     *
     * @return Empresa
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;

        return $this;
    }

    /**
     * Get delegacion
     *
     * @return string
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Set estadoDir
     *
     * @param string $estadoDir
     *
     * @return Empresa
     */
    public function setEstadoDir($estadoDir)
    {
        $this->estado_dir = $estadoDir;

        return $this;
    }

    /**
     * Get estadoDir
     *
     * @return string
     */
    public function getEstadoDir()
    {
        return $this->estado_dir;
    }

    /**
     * Set codPostal
     *
     * @param string $codPostal
     *
     * @return Empresa
     */
    public function setCodPostal($codPostal)
    {
        $this->cod_postal = $codPostal;

        return $this;
    }

    /**
     * Get codPostal
     *
     * @return string
     */
    public function getCodPostal()
    {
        return $this->cod_postal;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Empresa
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Empresa
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Empresa
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set representante
     *
     * @param string $representante
     *
     * @return Empresa
     */
    public function setRepresentante($representante)
    {
        $this->representante = $representante;

        return $this;
    }

    /**
     * Get representante
     *
     * @return string
     */
    public function getRepresentante()
    {
        return $this->representante;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Empresa
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Empresa
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Empresa
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Empresa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return Empresa
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \Vallas\ModelBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }
}
