<?php
// src/Document/User.php

namespace App\Document;


use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UserRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 * @MongoDB\Document(repositoryClass=UserRepository::class, collection="users")
 */
class User implements UserInterface
{   
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $nomprenom;

    /**
     * @MongoDB\UniqueIndex()
     * @MongoDB\Field(type="string")
     */
    protected $email;

    /**
     * @MongoDB\Field(type="string", nullable=true)
     */
    protected $entreprise;

    /**
     * @MongoDB\Field(type="raw")
     */
    protected $roles = [];

    /**
     * @var string The hashed password
     * @MongoDB\Field(type="string")
     */
    protected $password;

    /**
     * @MongoDB\Field(type="string", nullable=true)
     */
    protected $token;

    /**
     * @MongoDB\Field(type="date", nullable=true)
     */
    protected $datetoken;

    /**
     * @MongoDB\Field(type="boolean")
     */
    protected $enabled;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $dateadd;

    /**
     *
     * @MongoDB\Field(type="string", nullable=true)
     */
    protected $images;
    

    public function getId()
    {
        return $this->id;
    }

    public function getNomprenom(): ?string
    {
        return $this->nomprenom;
    }

    public function setNomprenom(?string $nomprenom): self
    {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    public function getDateadd(): ?\DateTimeInterface
    {
        return $this->dateadd;
    }

    public function setDateadd(?\DateTimeInterface $dateadd): self
    {
        $this->dateadd = $dateadd;

        return $this;
    }

    public function getDatetoken(): ?\DateTimeInterface
    {
        return $this->datetoken;
    }

    public function setDatetoken(?\DateTimeInterface $datetoken): self
    {
        $this->datetoken = $datetoken;

        return $this;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles ;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }  

    /*
    /** @see \Serializable::serialize() 
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() 
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, array('allowed_classes' => false));
    }
    */
}