<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="user_email_uindex", columns={"email"})})
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="api_token", type="string", length=200, nullable=false)
     */
    private $apiToken;

    public function __construct($email, $name, $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->apiToken = password_hash($this->email . $this->password, PASSWORD_DEFAULT);
    }


    public function getUsername()
    {
        return $this->email;
    }

    public function getSalt()
    {
        return '';
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
        $this->password =  '';
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }
}
