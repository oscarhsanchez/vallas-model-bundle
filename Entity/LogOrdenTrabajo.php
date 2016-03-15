<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\LogOrdenTrabajoRepository")
 * @ORM\Table(name="log_ordenes_trabajo")
 * @ORM\HasLifecycleCallbacks
 */
class LogOrdenTrabajo extends GenericEntity
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
    protected $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="codigo_user", referencedColumnName="codigo", nullable=true)
     */
    protected $user;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $fecha;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = false, unique=true)
     */
    protected $accion;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     *
     * @return Catorcena
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return integer
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set catorcena
     *
     * @param integer $catorcena
     *
     * @return Catorcena
     */
    public function setCatorcena($catorcena)
    {
        $this->catorcena = $catorcena;

        return $this;
    }

    /**
     * Get catorcena
     *
     * @return integer
     */
    public function getCatorcena()
    {
        return $this->catorcena;
    }

    /**
     * Set mes
     *
     * @param string $mes
     *
     * @return Catorcena
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set mesNumero
     *
     * @param integer $mesNumero
     *
     * @return Catorcena
     */
    public function setMesNumero($mesNumero)
    {
        $this->mes_numero = $mesNumero;

        return $this;
    }

    /**
     * Get mesNumero
     *
     * @return integer
     */
    public function getMesNumero()
    {
        return $this->mes_numero;
    }

    /**
     * Set catorcenaInicio
     *
     * @param integer $catorcenaInicio
     *
     * @return Catorcena
     */
    public function setCatorcenaInicio($catorcenaInicio)
    {
        $this->catorcena_inicio = $catorcenaInicio;

        return $this;
    }

    /**
     * Get catorcenaInicio
     *
     * @return integer
     */
    public function getCatorcenaInicio()
    {
        return $this->catorcena_inicio;
    }

    /**
     * Set catorcenaTermino
     *
     * @param integer $catorcenaTermino
     *
     * @return Catorcena
     */
    public function setCatorcenaTermino($catorcenaTermino)
    {
        $this->catorcena_termino = $catorcenaTermino;

        return $this;
    }

    /**
     * Get catorcenaTermino
     *
     * @return integer
     */
    public function getCatorcenaTermino()
    {
        return $this->catorcena_termino;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Catorcena
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
     * @return Catorcena
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
     * @return Catorcena
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
     * @return Catorcena
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return LogOrdenTrabajo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set accion
     *
     * @param string $accion
     *
     * @return LogOrdenTrabajo
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string
     */
    public function getAccion()
    {
        return $this->accion;
    }


    /**
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return LogOrdenTrabajo
     */
    public function setCodigoUser($codigoUser)
    {
        $this->codigo_user = $codigoUser;

        return $this;
    }

    /**
     * Get codigoUser
     *
     * @return string
     */
    public function getCodigoUser()
    {
        return $this->codigo_user;
    }
}
