<?php

namespace App\Domain;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(length=32) */
    private $name;
    /** @ORM\Column(length=32) */
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}