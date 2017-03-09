<?php

namespace Home\OrderBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SizeCategory
 *
 * @ApiResource
 * @ORM\Table(name="size_category")
 * @ORM\Entity
 * @UniqueEntity("name")
 */
class SizeCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(max="255")
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): SizeCategory
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

