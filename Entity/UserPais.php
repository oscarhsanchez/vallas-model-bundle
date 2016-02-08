<?php
namespace Vallas\ModelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\UserPaisRepository")
* @ORM\Table(name="user_pais")
* @ORM\HasLifecycleCallbacks
*/
class UserPais extends GenericEntity
{
    /**
     * @var User
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User", inversedBy="user_paises")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Pais
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;


    /**
     * Set user
     *
     * @param \Vallas\ModelBundle\Entity\User $user
     *
     * @return UserPais
     */
    public function setUser(\Vallas\ModelBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Vallas\ModelBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return UserPais
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais)
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
